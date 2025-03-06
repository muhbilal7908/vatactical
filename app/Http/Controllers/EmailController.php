<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailCompose;
class EmailController extends Controller
{
    public function index(){
        $data=Email::with('user')->where('status','!==','trash')->get();
        $users=User::all();
        $count=Email::with('user')->where('status','!==','trash')->get()->count();
        return view('backend_app.emails.email_app',compact('data','users','count'));
    }
    public function store(Request $request){

        foreach ($request->users as $key => $value) {
           $data= new Email;

           $user=User::find($value);
           if($user){
            $data->user_id=$value;
            mail::to($user->email)->send(new EmailCompose($data));
           }
           else{
           $data->name=$value;
           mail::to($data->name)->send(new EmailCompose($data));
           }
           $data->msg=$request->editor1;
           $data->subject=$request->subject;
           $data->status="sent";

           $data->save();

        }

        return back()->with('success','Mails has been sent successfully');

    }
    public function destroy(Request $request){

        foreach($request->mails_ids as $item){

            $data=Email::find($item);
            $data->status="trash";

            $data->save();
        }
        return redirect(route('all_mails'))->with('success','Mails have been moved to the trash');
    }
    public function remove(Request $request){

        foreach($request->mails_ids as $item){

            $data=Email::destroy($item);

        }
        return redirect(route('all_mails'))->with('success','Mails have been deleted successfully');
    }

    public function starred(Request $request){
        $data=Email::with('user')->where('starred',1)->get();
        $users=User::all();
        $count=Email::with('user')->where('status','!==','trash')->get()->count();
        return view('backend_app.emails.email_starred',compact('data','users','count'));
    }

    public function trash(Request $request){
        $data=Email::with('user')->where('status','trash')->get();
        $users=User::all();
        $count=Email::with('user')->where('status','!==','trash')->get()->count();
        return view('backend_app.emails.email_trash',compact('data','users','count'));
    }
    public function sent(Request $request){
        $data=Email::with('user')->where('status','sent')->get();
        $users=User::all();
        $count=Email::with('user')->where('status','!==','trash')->get()->count();
        return view('backend_app.emails.email_sent',compact('data','users','count'));
    }
}
