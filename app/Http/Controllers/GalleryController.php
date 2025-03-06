<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data=Gallery::paginate(6);
            return view('backend_app.gallery.index',compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'img'=>'required'
            ]);
            $data = new Gallery;
            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();
                $destinationpath=public_path('assets/gallery/');
                $image->move($destinationpath,$imgname);
                $data->img=$imgname;
            }
            $data->name=$request->name;
            $data->description=$request->description;
            $data->save();
            return back()->with('success','Image has been added successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $data=Gallery::find($id);
            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();
                $destinationpath=public_path('assets/gallery/');
                $image->move($destinationpath,$imgname);
                $data->img=$imgname;
            }
            $data->name=$request->name;
            $data->description=$request->description;
            $data->save();
            return back()->with('success',"Image has been updated successfully");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            Gallery::destroy($id);
            return back()->with('success','Image has been deleted successully');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    public function galleryStatus(Request $request){

        try {
            $galllery=Gallery::findOrFail($request->id);
            $galllery->featured= $request->status ? $request->status : '0';
            $galllery->save();
            $response=[
                'status'=>200,
                'message'=>"Featured Status has been updated successfully",
            ];
           return back()->with('success','Featured Status has been updated successfully');
        } catch (\Throwable $th) {
            $response=[
                'status'=>200,
                'message'=>$th->getMessage(),
            ];
            return back()->with('error',$th->getMessage());

        }

    }
}
