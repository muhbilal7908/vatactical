<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\Register;
use App\Mail\RegisterAdmin;
use App\Models\Giveaway;
use App\Models\SettingModel;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],


        ]);


     $recaptcha = SettingModel::find(1);


        if (isset($recaptcha) && $recaptcha['recaptcha_status'] == 1) {
            $secret_key = $recaptcha['recaptcha_secreat_password'];
            $response = $request->input('g-recaptcha-response');
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response;

            // Send a POST request to Google reCAPTCHA for verification
            $client = new \GuzzleHttp\Client();
            $response = $client->post($url);
            $body = json_decode($response->getBody());

            if (!$body->success) {
                return back()->with("error","Recaptcha Failed");
            }
        }

        $user_img=null;

        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();
            $destinationpath=public_path('assets/users/');
            $image->move($destinationpath,$imgname);
            $user_img=$imgname;
        }

        $user = User::create([
            'img'=>$user_img,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>'user',
            'company'=>$request->company,
            'address'=>$request->address,
            'phone_no'=>$request->phone_no,
            'zip_code'=>$request->zip_code,
            'country'=>$request->country,
        ]);

        $giveaway=new Giveaway;
        $giveaway->user_id=$user->id;
        $giveaway->save();

        event(new Registered($user));

        Auth::login($user);
        mail::to($request->email)->send(new Register($request));
        $admin_mail=SettingModel::find(1);
        mail::to($admin_mail->mailer_email_id)->send(new RegisterAdmin($request));

        $user=Auth::user();

        if($user->role==="user"){
            return redirect(route('CustomerDashboard'));
        }
        else{
            return redirect(RouteServiceProvider::DASHBOARD);
        }
    }
}
