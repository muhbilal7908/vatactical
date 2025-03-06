<?php

namespace App\Http\Controllers;

use App\Models\Transection;
use App\Models\User;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
class TransectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        $data=Transection::with('user')->latest()->paginate(20);

        return view('backend_app.transections.index',compact('data','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function excelexport(){

        $users = Transection::with('user')->get();

        // Initialize an array to store data for export
        $storage = [];

        foreach ($users as $key => $item) {
            $storage[] = [
                'S.No' => $key + 1, // Increment key by 1 for 1-based serial number
                'Name' => $item->user->name,
                'Message' => $item->msg,
                'Amount' => $item->amount,
                'Transection Date' => $item->transaction_date,
            ];
        }
        // Define file path for export

        $filePath = storage_path('app/temp/all_transections.xlsx');
        (new FastExcel($storage))->export($filePath);
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function search(Request $request){
        $request->validate([
            'user' => 'nullable|exists:users,id', // Assuming you have a users table with an id column
            'date_from' => 'nullable|date_format:Y-m-d',
        ]);

        $query= Transection::query();
        $users=User::all();

        if($request->has('user')  & $request->user != null){
            $query->where('user_id',$request->user);
        }
        if($request->has('date_from') & $request->date_from != null){
            $query->whereDate('transaction_date', '=', $request->date_from);
        }
        $data=$query->with('user')->paginate(20);
        return view('backend_app.transections.index',compact('data','users'));



    }

}
