<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
class NotificationController extends Controller
{
    public function index(){
        Notification::where('mark', 0)->update(['mark' => 1]);
        $data=Notification::paginate(21);
        return view('backend_app.notifications.all_notificatoins',compact('data'));
    }
    public function destroy($id){
        try {
            Notification::destroy($id);
            return back()->with('success','Notification has been deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }

    }
}
