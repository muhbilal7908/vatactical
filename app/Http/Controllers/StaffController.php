<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffMember;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=StaffMember::all();
        return view('backend_app.staff.all_staff',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('backend_app.add_staff');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $data=new StaffMember;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone_no=$request->phone_no;
        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();

            $destinationpath=public_path('assets/staff/');
            $image->move($destinationpath,$imgname);

            $data->img=$imgname;

        }
        $data->description=$request->description;
        $data->facebook=$request->facebook;
        $data->instagram=$request->instagram;
        $data->linkedin=$request->linkedin;
        $data->save();
        return back()->with('success','New staff has been added');
    } catch (\Throwable $th) {
       return back()->with('error',$th->getMessage());
    }



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
        try {

        $data=StaffMember::find($id);
        return view('backend_app.staff.edit_staff',compact('data'));

        } catch (\Throwable $th) {
          return back()->with('error',$th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        try {
            $data=StaffMember::find($id);
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone_no=$request->phone_no;
            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();

                $destinationpath=public_path('assets/staff/');
                $image->move($destinationpath,$imgname);

                $data->img=$imgname;

            }
            $data->description=$request->description;
            $data->facebook=$request->facebook;
            $data->instagram=$request->instagram;
            $data->linkedin=$request->linkedin;
            $data->save();
            return back()->with('success','Staff has been updated successfully');
        } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            StaffMember::destroy($id);
            return back()->with('success','Staff member has been deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('error',"Staff member can'not be deleted");

        }


    }
}
