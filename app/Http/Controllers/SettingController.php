<?php

namespace App\Http\Controllers;

use App\Models\ShippingPayment;
use Illuminate\Http\Request;
use App\Models\SettingModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function GeneralSetting(){
        $data=SettingModel::where('id',1)->first();
        $shipping= ShippingPayment::find(1);
        return view('backend_app.setting.generalsetting',compact('data','shipping'));
    }
    public function UpdateSetting(Request $request){
        $data = SettingModel::where('id', 1)->first();
        if($request->data_from==="business_setting"){
        $data->email=$request->email;
        $data->address=$request->address;
        $data->phone_no=$request->phone_no;
        $data->footer_tagline=$request->footer_tagline;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        if ($request->hasFile('logo')) {
            $image=$request->file('logo');
            $imgname=$request->file('logo')->getClientOriginalName();
            $destinationpath=public_path('assets/featured_images/');
            $image->move($destinationpath,$imgname);
            $data->logo=$imgname;
        }

        if ($request->hasFile('footer_logo')) {
            $image=$request->file('footer_logo');
            $imgname=$request->file('footer_logo')->getClientOriginalName();
            $destinationpath=public_path('assets/featured_images/');
            $image->move($destinationpath,$imgname);
            $data->footer_logo=$imgname;
        }
        $data->save();
        return back()->with('success', 'Business Setting has been updated successfully');
    }
    elseif($request->data_from==="social_media"){
        $data->facebook=$request->facebook;
        $data->instagram=$request->instagram;
        $data->twitter=$request->twitter;
        $data->linkedin=$request->linkedin;
        $data->ticktok=$request->ticktok;
        $data->youtube=$request->youtube;
        $data->save();
        return back()->with('success', 'Social media links has been updated successfully');
    }
    elseif($request->data_from==="3rd_party"){
        $data->bankful_username=$request->bankful_username;
        $data->bankful_password=$request->bankful_password;
        $data->pusher_id=$request->pusher_id;
        $data->pusher_app_key=$request->pusher_key;
        $data->pusher_secreat_key=$request->pusher_secreat;
        $data->save();
         return back()->with('success', '3rd party has been updated successfully');
    }

    elseif($request->data_from==="mail_config"){

        $data->mailer_name=$request->mail_name;
        $data->mailer_host=$request->mail_host;
        $data->mailer_driver=$request->mail_driver;
        $data->mailer_port=$request->mail_port;
        $data->mailer_email_id=$request->mail_email_id;
        $data->mailer_encryption=$request->mail_encryption;
        $data->mailer_password=$request->mail_password;
        $data->mailer_username=$request->mailer_username;
        $data->save();
        return back()->with('success', 'Mail Configuration Setting has been updated successfully');
    }
    elseif($request->data_from==="recaptcha"){

        $data->recaptcha_status=$request->status;
        $data->recaptcha_site_key=$request->recaptcha_site_key;
        $data->recaptcha_secreat_password=$request->recaptcha_secreat_key;
        $data->save();
        return back()->with('success', 'Recaptcha Setting has been updated successfully');

    }
    elseif($request->data_from==="shipping"){

        $data=ShippingPayment::find(1);
        $data->shipping_price=$request->shipping_price;
        $data->sales_tax=$request->sales_tax;
        $data->save();
        return back()->with('success', 'Shipping price has been updated successfully');
    }


    }


    public function editProfile($id){
        $data=User::where('id',$id)->first();
        return view('backend_app.users.edit_profile',compact('data'));
    }

    public function UpdateProfile(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            // 'password' => 'required|min:6', // You can adjust the minimum length as needed
            // 'confirm_password' => 'required|same:password',
        ]);

            $data = User::where('id', $request->id)->first();
            $data->name=$request->name;
            $data->email=$request->email;
            $data->address=$request->address;
            $data->phone_no=$request->phone_no;
            $data->company=$request->company;
            $data->zip_code=$request->zip_code;
            // $data->password=Hash::make($request->password);

            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();

                $destinationpath=public_path('assets/users/');
                $image->move($destinationpath,$imgname);

                $data->img=$imgname;
            }



            $data->save();

            return back()->with('success', 'Your Setting has been updated');



    }
    public function updatePassword(Request $request,$id){
        $request->validate([
            'password' => 'required',

        ]);

        // Find the user
        $user = User::find($id);

        // Check if the current password matches the one in the database
        if (!password_verify($request->input('password'), $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        // Update the user's password
        $user->password = bcrypt($request->input('new-password'));
        $user->save();

        return redirect()->route('edit-profile',['id'=>$user->id])->with('success', 'Password updated successfully');
    }


}
