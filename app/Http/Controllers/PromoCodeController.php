<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocode;
class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Promocode::all();
        return view('backend_app.promocodes.all_promocodes',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend_app.promocodes.add_promocode');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'promocode'=>"required",
            'date'=>"required",
        ]);
            $data= new Promocode;
            $data->code=$request->promocode;
            $data->expire_date=$request->date;
            $data->discount=$request->discount;
            $data->save();
            return back()->with('success','New Promocode has been added');
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
    public function edit($id)
    {
        $data=Promocode::find($id);
        return view('backend_app.promocodes.edit_promocode',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'promocode'=>"required",
            'date'=>"required",
        ]);
            $data= Promocode::find($id);
            $data->code=$request->promocode;
            $data->expire_date=$request->date;
            $data->discount=$request->discount;
            $data->save();
            return redirect(route('all-promocodes'))->with('success','Promocode has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

        Promocode::destroy($id);
        return back()->with("success",'Item has been deleted successfully');
          //code...
        } catch (\Throwable $th) {
        return back()->with('error',$th->getMessage());
        }
    }
}
