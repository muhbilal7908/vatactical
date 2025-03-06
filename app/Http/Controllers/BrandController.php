<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Brand::all();
        return view('backend_app.brands.brands',compact('data'));
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
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);
        try {
            $data=new Brand;
            $data->name=$request->name;
            $url = $request->url;
            $slug = Str::slug($url, '-'); // Slugify the URL
            $hyphenatedUrl = str_replace(' ', '-', $slug); // Replace spaces with hyphens
            $data->slug = $hyphenatedUrl;
            $data->description=$request->description;

            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();

                $destinationpath=public_path('assets/brands/');
                $image->move($destinationpath,$imgname);
                $data->img=$imgname;

            }
            $data->save();
            return back()->with('success',$data->name.'Has Been Added');
        } catch (\Throwable $th) {
            return back()->with('error','Something Went Wrong');
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
        try {
            $data= Brand::find($id);
            return view('backend_app.brands.edit_brand',compact('data'));
        } catch (\Throwable $th) {
            return back()->with('Something went wrong');

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $data=Brand::find($id);
        $data->name=$request->name;
        $url = $request->slug;
        $slug = Str::slug($url, '-'); // Slugify the URL
        $hyphenatedUrl = str_replace(' ', '-', $slug); // Replace spaces with hyphens
        $data->slug = $hyphenatedUrl;
        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();

            $destinationpath=public_path('assets/brands/');
            $image->move($destinationpath,$imgname);
            $data->img=$imgname;

        }
        $data->save();
        return redirect(route('show-brands'))->with('success',$data->name.' Has been updated');
        } catch (\Throwable $th) {
           return back()->with('Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Brand::find($id);
        $data->Products()->detach();
        Brand::destroy($id);
        return back()->with('success', $data->name.' Has Been Deleted');
    }
}
