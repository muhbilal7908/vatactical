<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
class FormController extends Controller
{


    public function ContactForm(Request $request){
        try {
            $data=Form::all();
        return view('backend_app.contactforms.contact_forms',compact('data'));
        } catch (\Throwable $th) {
        return back()->with('error','something went wrong');
        }

    }

    public function deleteContact($id){
        try {
       Form::destroy($id);
       return back()->with('success',"Deleted successfully");

        } catch (\Throwable $th) {
        return back()->with('error',"Can't delete something went wrong");
        }
    }
}
