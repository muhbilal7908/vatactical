<?php

namespace App\Http\Controllers;

use App\Models\GiftCard;
use App\Models\MainMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
class MembershipController extends Controller
{
    public function index(Request $request)
    {
        $query = MainMembership::with('membership');
    
        // Apply filters based on request input
        if ($request->filled('membership_id')) {
            $query->where('id', $request->membership_id);
        }
    
        if ($request->filled('membership')) {
            $query->where('membership_id', $request->membership);
        }
    
        if ($request->filled('customer_name')) {
            $query->where('first_name', 'like', $request->customer_name . '%');
        }
    
        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('created_at', [$request->date_from, $request->date_to]);
        }
    
        // Get paginated data
        $data = $query->latest()->paginate(10); // Paginate with 10 items per page
        $count = $query->count(); // Count the total number of results
        $memberships = GiftCard::all(); // Fetch all gift cards
    
        return view('backend_app.memberships.index', compact('data', 'count', 'memberships'));
    }
    

    public function show($id){
        $data=MainMembership::with('membership','members')->find($id);
        return view('backend_app.memberships.detail',compact('data'));
    }

    public function generatePDF(){
        $data=MainMembership::latest()->get();
        // Create an instance of the Dompdf class
        $dompdf = new Dompdf();

        // Load HTML content from a blade view
        $html = view('backend_app.pdf_template.pdf_memberships',compact('data'))->render();

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (optional: save the PDF to a file instead of outputting it directly)
        $dompdf->render();

        // Output PDF to browser
        return $dompdf->stream('all_memberships.pdf');

    }
   

}
