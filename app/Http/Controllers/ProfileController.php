<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Cart;
use App\Models\CourseSubscribe;
use App\Models\Favourite;
use App\Models\HallOfFame;
use App\Models\Review;
use Dompdf\Dompdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Order;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function AllUsers(){
        try {
            $data=User::where('role','user')->paginate(25);
        return view('backend_app.users.all_users',compact('data'));
        } catch (\Throwable $th) {
          return back()->with('error',$th->getMessage());
        }

    }
    public function UserDelete($id){
        try {
            $user = User::find($id);
            Order::where('user_id',$id)->delete();
            CourseSubscribe::where('user_id',$id)->delete();
            Review::where('user_id',$id)->delete();
            HallOfFame::where("user_id",$id)->delete();
            Favourite::where('user_id',$id)->delete();
            Cart::where('user_id',$id)->delete();
            User::destroy($id);
            return back()->with('success','User successfully deleted');

        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());

        }

    }

    public function search_user(Request $request)
    {
        // Start with a base query
        $query = User::query();

        // Check if 'user_name' is provided and not empty
        if ($request->filled('user_name')) {
            $query->where('name', 'like', $request->user_name . '%');
        }


        // Check if 'phone_no' is provided and not empty
        if ($request->filled('phone_no')) {
            $query->where('phone_no', $request->phone_no);
        }

        // Check if 'email' is provided and not empty
        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }

        // Paginate the results with 21 items per page
        $data = $query->paginate(21);

        // Pass the data to the view
        return view('backend_app.users.all_users', compact('data'));
    }
    public function generate_pdf(){
        $data=User::all();
        // Create an instance of the Dompdf class
        $dompdf = new Dompdf();

        // Load HTML content from a blade view
        $html = view('backend_app.pdf_template.pdf_users',compact('data'))->render();

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (optional: save the PDF to a file instead of outputting it directly)
        $dompdf->render();

        // Output PDF to browser
        return $dompdf->stream('users.pdf');

    }

    public function export_excel()
    {
        $users = User::all();

        // Initialize an array to store data for export
        $storage = [];

        foreach ($users as $key => $item) {
            $storage[] = [
                'S.No' => $key + 1, // Increment key by 1 for 1-based serial number
                'Name' => $item->name,
                'Email' => $item->email,
                'Phone_no' => $item->phone_no,
            ];
        }
        // Define file path for export

        $filePath = storage_path('app/temp/all_files.xlsx');
        (new FastExcel($storage))->export($filePath);
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    
public function userInfo($id){
    $data=User::find($id);
    $ordersdata=Order::where('user_id',$id)->get();
    $subscriptions=CourseSubscribe::where('user_id',$id)->get();

    return view('backend_app.users.user_profile',compact('data','ordersdata','subscriptions'));
}
}
