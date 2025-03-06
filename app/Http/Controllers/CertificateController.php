<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Certificate::paginate(21);
        return view('backend_app.certificates.all_certificates',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend_app.certificates.add_certificate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'short_description'=>'required',
            'course'=>'required',
            'tagline'=>'required',
        ]);

        $data=new Certificate;
        $data->name=$request->name;
        $data->short_description=$request->short_description;
        $data->course=$request->course;
        $data->tagline=$request->tagline;
        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname = str_replace(' ', '', $request->file('img')->getClientOriginalName());


            $destinationpath=public_path('assets/certificates/');
            $image->move($destinationpath,$imgname);

            $data->img=$imgname;

        }

        $data->save();
        return back()->with('success','Certificate has added successfully');



    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data=Certificate::all();
        return view('front-app.pages.certificates',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=Certificate::find($id);
        return view('backend_app.certificates.edit_certificate',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $data=Certificate::find($id);
            $data->name=$request->name;
            $data->short_description=$request->short_description;
            $data->course=$request->course;
            $data->tagline=$request->tagline;
            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname = str_replace(' ', '', $request->file('img')->getClientOriginalName());

                $destinationpath=public_path('assets/certificates/');
                $image->move($destinationpath,$imgname);

                $data->img=$imgname;

            }

            $data->save();
            return back()->with('success','Certificate has added successfully');
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
        Certificate::destroy($id);
        return back()->with('success',"Certificate has been deleted successfully");
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
}
