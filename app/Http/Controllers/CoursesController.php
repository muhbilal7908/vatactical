<?php

namespace App\Http\Controllers;

use App\Models\StaffMember;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Slots;
use Illuminate\Support\Str;
use App\Models\CourseSubscribe;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data= Course::where('status',1)->get();
            $staff=StaffMember::all();
        return view('front-app.courses',$data,);
        } catch (\Throwable $th) {
            return back()->with('error','Something went wrong');
        }

    }

    /**
     * Show the form for creating a new resource.
     */

     public function add_course(){
        try {
            return view('backend_app.courses.addcourse');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
     }
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
        ]);
            $data= new course;
            $data->name=$request->name;
            $url = $request->name;
            $slug = Str::slug($url, '-'); // Slugify the URL
            $hyphenatedUrl = str_replace(' ', '-', $slug);
            $data->slug = $hyphenatedUrl;
            $data->price=$request->price;
            $data->sale_price=$request->sale_price;
            $data->description=$request->description;

            $data->video=$request->video_link;

            $data->order_number=$request->order_number;
            $data->seats=$request->seats;
            $data->meta_title=$request->meta_title;
            $data->meta_description=$request->meta_description;

            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();
                $img = Str::slug($imgname, '-'); // Slugify the URL
                $imgconcate = str_replace(' ', '-', $img);
                $destinationpath=public_path('assets/courses/');
                $image->move($destinationpath,$imgconcate);
                $data->img=$imgconcate;
            }
            $data->save();
            return redirect(route('all-courses'))->with('success',$data->name.' has been added');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        try {
            $data= Course::with('slots')->paginate(5);
            $all_courses= Course::with('slots')->where('status',1)->get();

            $staff=StaffMember::all();
        return view('backend_app.courses.courses',compact('data','staff','all_courses'));
        } catch (\Throwable $th) {
            return back()->with('error','Something went wrong');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $data=Course::find($id);
            return view('backend_app.courses.edit_course',compact('data'));
        } catch (\Throwable $th) {
            return back()->with('eror','Something went wrong');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'name'=>'required',
            'price'=>'required',
        ]);

        try {
            $data=Course::find($id);
            $data->name=$request->name;
            $url = $request->name;
            $slug = Str::slug($url, '-'); // Slugify the URL
            $hyphenatedUrl = str_replace(' ', '-', $slug);
            $data->slug = $hyphenatedUrl;
            $data->price=$request->price;
            $data->sale_price=$request->sale_price;
            $data->description=$request->description;
            $data->video=$request->video_link;

          
            $data->seats=$request->seats;
            $data->order_number=$request->order_number;
            $data->meta_title=$request->meta_title;
            $data->meta_description=$request->meta_description;

            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();
                $img = Str::slug($imgname, '-'); // Slugify the URL
                $imgconcate = str_replace(' ', '-', $img);
                $destinationpath=public_path('assets/courses/');
                $image->move($destinationpath,$imgconcate);
                $data->img=$imgconcate;
            }
            $data->save();
            return redirect(route('all-courses'))->with('success',$data->name.' has been updated');

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
            Course::destroy($id);
            return back()->with('success','Your course has been deleted');
        } catch (\Throwable $th) {
           return back()->with('error',$th->getMessage());
        }

    }
    public function Slots($id){
    $data=Course::find($id);
    $slots=Slots::where('course_id',$id)->get();
    $staffs = StaffMember::all();
    return view('backend_app.courses.courses_slots',compact('data','slots','staffs'));
    }

    
    public function AddSlot(Request $request){

        try {
        $data=new Slots;
        $data->course_id=$request->course_id;
        $data->start_time=$request->start_time;
        $data->end_time=$request->end_time;
        $data->location=$request->location;
        $data->staff_id=$request->staff;
        $data->repeat=$request->repeat;
        $data->date=$request->date;

        $data->save();
        return back()->with("success",'New  Class Session has been added');
} catch (\Throwable $th) {
    return back()->with("error","Please fill all the fields");
}
    }

    public function updateSlot(Request $request,$id){

        try {
        $data=Slots::find($id);
        $data->update([
        'start_time'=>$request->start_time,
        'end_time'=>$request->end_time,
        'location'=>$request->location,
        'staff_id'=>$request->staff,
        'repeat'=>$request->repeat,
        'date'=>$request->date
        ]);
        
        return back()->with("success",'Class Session has been updated');
} catch (\Throwable $th) {
    return back()->with("error","Please fill all the fields");
}
    }

    

    public function DeleteSlot($id){
        try {
        Slots::destroy($id);
        return back()->with("success",'Slot has been deleted successfully');
            } catch (\Throwable $th) {
                return back()->with("success",$$th->getmessage());
            }
}
public function coursesFilter(Request $request){
    $date = $request->date;
    $time=$request->date;
    $data = Slots::where('date', $date)->orderBy('start_time', 'asc')->get();

return view('backend_app.courses.courses_filter',compact('data','time'));
}
public function coursesSessions(){
    $date = today()->toDateString();
    $time= today()->toDateString();
    $courses=Course::all();
    $data = Slots::where('date', $date)->orderBy('start_time', 'asc')->get();
return view('backend_app.courses.courses_filter',compact('data','time','courses'));
}
public function findCourses(Request $request){
    $formattedDate = Carbon::createFromFormat('F j, Y', $request->date)->format('Y-m-d');

    // Use the formatted date in your query
    $data = Slots::with('course','staff')
                  ->where('date', $formattedDate)
                  ->get();
                  return response()->json($data);
}
public function Allslots(){
        $data=Slots::with('course','staff')->get();
  
        $events = [];

foreach ($data as $event) {

    $formattedDate = Carbon::createFromFormat('Y-m-d', $event['date'])->format('F j, Y');

    // Assuming 'type' is some value you want to add to each event
    $type = 'event'; // Change this to the actual type you want to add

    $events[] = [
        'date' => $formattedDate,
        'type' => $type,
        'description' => "Repeat:".$event->repeat,
        'everyYear'=>true,
        'name'=>$event->course->name,
        'id'=>$event->id,
        'badge'=>$event->staff->name,
        'staff'=>$event->staff->img,
        'staff_name'=>$event->staff->name,
        'start_time'=>$event->start_time,
        'end_time'=>$event->end_time,
        'location'=>$event->location

    ];
}
return response()->json($events);
}

public function course_participents(){
    return view('backend_app.participents_calender.calender');
}

public function get_subscriptions(){
    $data = CourseSubscribe::with('courses', 'users')->get();
    $responseData = [];

    foreach($data as $subscription){
        $date = $subscription->date;
        $courseName = $subscription->courses->name;
        $totalSeats = $subscription->courses->seats;
        $starTime = $subscription->start_time;
        $endTime = $subscription->end_time;



        // Count the bookings for each date
        if (!isset($responseData[$date])) {
            $responseData[$date] = [
                'start_date' => $date,
                'end_date' => date('Y-m-d', strtotime($date . ' +1 day')),
                'total_seats' => $totalSeats,
                'bookings' => 0,
                'course_name' => $courseName,
                'users' => [],
                'start_time'=>$starTime,
                'end_time'=>$endTime,

            ];
        }

        $responseData[$date]['bookings']++;
        $responseData[$date]['users'][] = $subscription->first_name . ' ' . $subscription->last_name;
    }


    // Re-index the array with numeric keys
    $responseData = array_values($responseData);

    return response()->json($responseData);
}

public function status(Request $request){

    try {
        $course=Course::findOrFail($request->id);
        $course->status= $request->status;
        $course->save();
        $response=[
            'status'=>200,
            'message'=>"Course Status has been updated successfully",
        ];
        return response()->json($response);
    } catch (\Throwable $th) {
        $response=[
            'status'=>200,
            'message'=>$th->getMessage(),
        ];
        return response()->json($response);
    }

}
    public function filter(Request $request){
        try {
            $staff=StaffMember::all();
            $data = Course::where('name', 'like', $request->name . '%')->paginate(5);
            return view('backend_app.courses.courses', compact('data','staff'));
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }




}
