<?php

namespace App\Http\Controllers;

use App\Models\HallOfFame;
use Illuminate\Http\Request;

class FameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=HallOfFame::with('user','course')->latest()->get();
        return view('front-app.fame',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('backend_app.members.add_member');

        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());


        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id'=>"required",
            'img'=>"required",
        ]);

        try {
      $data=new HallOfFame;
      $data->user_id=$request->user_id;

      if ($request->hasFile('img')) {
        $image=$request->file('img');
        $imgname=$request->file('img')->getClientOriginalName();

        $destinationpath=public_path('assets/fame_members/');
        $image->move($destinationpath,$imgname);

        $data->img=$imgname;

    }

      $data->save();
      return back()->with('success','New member has successfully added');
    } catch (\Throwable $th) {
       return back()->with('error',$th->getMessage());
    }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        try {
            $data=HallOfFame::all();
            return view('backend_app.members.all_members',compact('data'));
        } catch (\Throwable $th) {
          return back()->with('error',$th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data=HallOfFame::find($id);
            return view('backend_app.members.edit_member',compact('data'));
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
            $data=HallOfFame::find($id);
            $data->user_id=$request->user_id;

            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();

                $destinationpath=public_path('assets/fame_members/');
                $image->move($destinationpath,$imgname);

                $data->img=$imgname;

            }


            $data->save();
            return redirect(route('hall-of-fame'))->with('success','Member has been updated successfully');
          } catch (\Throwable $th) {
             return back()->with('error',$th->getMessage());
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            HallofFame::destroy($id);
            return back()->with('success','Member has deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('error','Member has not deleted successfully');

        }

    }
}
