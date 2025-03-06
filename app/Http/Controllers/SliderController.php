<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Slider::all();
        return view('backend_app.slider.all_slides',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend_app.slider.add_slide');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=new Slider;
        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();
            $destinationpath=public_path('assets/slide/');
            $image->move($destinationpath,$imgname);
            $data->img=$imgname;
        }
        $data->save();
        return back()->with('success','Slide has been added successfully');

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
        $data=Slider::find($id);
        return view('backend_app.slider.edit_slide',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=Slider::find($id);
        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();
            $destinationpath=public_path('assets/slide/');
            $image->move($destinationpath,$imgname);
            $data->img=$imgname;
        }
        $data->save();
        return redirect(route('all-sliders'))->with('success','Slide has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Slider::destroy($id);
        return back()->with('success','Slide has been deleted successfully');
    }
}
