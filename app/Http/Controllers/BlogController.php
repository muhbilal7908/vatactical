<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    function addblog(Request $req){
        $req->validate([
            'name'=>'required',
            'url'=>'required',
        ]);
        $data= new Blog;
        $data->name=$req->name;
        $url = $req->url;
        $slug = Str::slug($url, '-'); // Slugify the URL
        $hyphenatedUrl = str_replace(' ', '-', $slug); // Replace spaces with hyphens
        $data->slug = $hyphenatedUrl;
        $data->img=$req->img;
        $data->category_id=$req->category;
        $data->description=$req->description;
        if ($req->hasFile('img')) {
            $image=$req->file('img');
            $imgname=$req->file('img')->getClientOriginalName();

            $destinationpath=public_path('assets/blogs/');
            $image->move($destinationpath,$imgname);

            $data->img=$imgname;

        }
        $data->save();

        return redirect(route('all-blogs'))->with('success',$data->name.' Blog Has Been Added');

    }


    function filter(Request $req){
    $data=Blog::where("category",$req->val);
        // return redirect('')
    }
    function updateblog(Request $req){
        $req->validate([
            'name'=>'required',
            'url'=>'required',
        ]);
    $data=Blog::find($req->id);
    $data->name=$req->name;
    $url = $req->url;
    $slug = Str::slug($url, '-'); // Slugify the URL

    $hyphenatedUrl = str_replace(' ', '-', $slug); // Replace spaces with hyphens
    $data->slug = $hyphenatedUrl;
    $data->category_id=$req->category;
// img

if ($req->hasFile('img')) {
    $image=$req->file('img');
    $imgname=$req->file('img')->getClientOriginalName();

    $destinationpath=public_path('assets/blogs/');
    $image->move($destinationpath,$imgname);

    $data->img=$imgname;

}
//

        $data->description=$req->description;
        $data->save();

        return redirect(route('all-blogs'))->with('success',$data->name.' blog has been updated');

}
function checkblog($id){
    $data=Blog::find($id);
    return view('backend_app.blogs.edit_blog',['data'=>$data]);
}
function destroy($id){
  Blog::destroy($id);

return back()->with('success','Blog has been deleted');
}
function findblog($id){
    $data=Blog::find($id);

    $category=Blog::where('category_id',$data->category)->get();

    return view('Pages.Blogtemplate',['data'=>$data,'category_id'=>$category]);
}
function showallblogs(){

    $data=Blog::all();
    return view('backend_app.blogs.blogs',["data"=>$data]);
}
function deletecheckboxBlog(Request $request){
    $selectedIds = $request->input('checkbox');

    if (!empty($selectedIds)) {
        Blog::whereIn('id', $selectedIds)->delete();
        return redirect()->back()->with('success', 'Selected records have been deleted.');
    }
}
    public function update_blog_status(Request $request){


            try {
                $product=Blog::findOrFail($request->id);
                $product->featured= $request->status;
                $product->save();
                $response=[
                    'status'=>200,
                    'message'=>"Featured Status has been updated successfully",
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
}
