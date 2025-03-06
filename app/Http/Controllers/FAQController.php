<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Faq::all();
        return view('backend_app.faqs.all_faqs',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend_app.faqs.add_faq');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           $data=new Faq;
           $data->title=$request->title;
           $data->description=$request->description;
           $data->save();
           return back()->with("success",'FAQ has been added successfully');

        } catch (\Throwable $th) {
            return back()->with("error",$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data=Faq::all();
        return view('front-app.pages.faqs',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $data=Faq::find($id);
            return view('backend_app.faqs.edit_faq',compact('data'));
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
            $data=Faq::find($id);
            $data->title=$request->title;
            $data->description=$request->description;
            $data->save();
            return redirect(route('all-faqs'))->with("success",'FAQ has been updated successfully');

         } catch (\Throwable $th) {
             return back()->with("error",$th->getMessage());
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Faq::destroy($id);
        return back()->with("success","Faq has been added succesfully");
        } catch (\Throwable $th) {
            return back()->with("error",$th->getMessage());
        }

    }
}
