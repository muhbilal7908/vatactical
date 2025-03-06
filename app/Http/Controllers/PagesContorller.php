<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;

class PagesContorller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $about=PageContent::where('type','about')->value('content');
        $privacy_policy=PageContent::where('type','privacy_policy')->value('content');
        $terms_condition=PageContent::where('type','terms_condition')->value('content');
        $course=PageContent::where('type','course')->value('content');


        return view('backend_app.pages.all_pages',compact('about','privacy_policy','terms_condition','course'));
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
        try {


        $data =PageContent::where('type',$request->data_from)->first();
        $data->type=$request->data_from;
        $data->content=$request->description;
        $data->save();
        return back()->with("success",$data->type.' data has been updated successfully');
          //code...
        } catch (\Throwable $th) {
            return back()->with("error", $th->getMessage());
        }
    }

    public function privacy_policy(){
        $data =PageContent::where('type',"privacy_policy")->value('content');
        return view('front-app.pages.privacy_policy',compact('data'));
    }
    public function terms_condition(){
        $data =PageContent::where('type',"terms_condition")->value('content');
        return view('front-app.pages.terms_conditions',compact('data'));
    }

    public function about(){
        $data =PageContent::where('type',"about")->value('content');
        return view('front-app.pages.about',compact('data'));
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
}
