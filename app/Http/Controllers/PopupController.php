<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Models\Popup;
class PopupController extends Controller
{
    public function popup(){
        $data=Popup::where('id',1)->first();
        return view('backend_app.popup.popup',compact('data'));
    }
    public function update(Request $request){
        try {

        $data=Popup::find(1);
        $data->title=$request->title;
        $data->url=$request->url;
        if($request->status === "on"){
            $data->status = "1";
        }
        else{
            $data->status = "0";
        }

        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();
            $destinationpath=public_path('assets/popup/');
            $image->move($destinationpath,$imgname);
            $data->img=$imgname;
        }
        $data->save();
        return back()->with('success','Popup has been updated successfully');
          //code...
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
}
