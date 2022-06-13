<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Course;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('home.user.index', [
            'setting' => $setting
        ]);
    }

    public function comments()
    {
        $setting = Setting::first();
        $comments = Comment::where('user_id', '=', Auth::id())->get();
        return view('home.user.comments', [
            'setting' => $setting,
            'comments' => $comments
        ]);
    }

    public function courses()
    {
        $setting = Setting::first();
        $user = User::find(Auth::id());
        $courses = $user->courses;
        return view('home.user.courses', [
            'setting' => $setting,
            'courses' => $courses
        ]);
    }

    public function createdcourses()
    {
        $setting = Setting::first();
        $user = User::find(Auth::id());
        $courses = $user->createdCourses;
        return view('home.user.createdCourses', [
            'setting' => $setting,
            'courses' => $courses
        ]);
    }

    public function commentdestroy($id)
    {
        $setting = Setting::first();
        $data = Comment::find($id);
        $data->delete();
        return redirect(route('userpanel.comments'));
    }

    public function shopcart($id)
    {
        $setting = Setting::first();
        $data = Course::find($id);
        $user = User::find(Auth::id());
        return view('home.user.shopcart', [
            'setting' => $setting,
            'data' => $data,
            'user' => $user
        ]);
    }

    public function storeorder(Request $request)
    {
        $cardcheck = "True";

        if ($cardcheck == 'True') {
            $data = new Order();
            $data->course_id = $request->input('course_id');
            $data->user_id = Auth::id();
            $data->price = $request->input('price');
            $data->IP = $_SERVER['REMOTE_ADDR'];
            $data->save();

            return redirect()->route('userpanel.ordercomplete')->with('success', 'Course Order Successfuly');
        } else {
            return redirect()->route('userpanel.ordercomplete')->with('error', 'Your credit card is not valid');
        }
    }

    public function ordercomplete()
    {
        //
        $setting = Setting::first();
        return view('home.user.ordercomplete', ['setting' => $setting]);
    }

    public function orders()
    {
        $setting = Setting::first();
        $orders = Order::where('user_id', '=', Auth::id())->get();
        return view('home.user.orders', [
            'setting' => $setting,
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createcourse()
    {
        //
        $setting = Setting::first();
        $data = Category::all();
        return view('home.user.course.create', [
            'setting' => $setting,
            'data' => $data
        ]);
    }

    public function showcourse($id)
    {
        $setting = Setting::first();

        if (Auth::user()->createdCourses->contains('id', $id)) {
            $data = Course::find($id);
            return view('home.user.course.show', [
                'setting' => $setting,
                'data' => $data
            ]);
        } else {
            return view('home._blan', ['setting' => $setting]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecourse(Request $request)
    {
        //
        $data = new Course();
        $data->user_id = Auth::id();
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $_POST['detail'];
        $data->price = $request->price;
        $data->status = 'True';
        if ($request->hasFile('image')) {
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect('userpanel/createdcourses');

    }

    public function coursedestroy($id)
    {
        //
        $data = Course:: find($id);
        if($data->image && Storage::disk('public')->exists($data->image))
        {
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect('userpanel/createdcourses');
    }

    public function courseedit(Course $course, $id)
    {
        //
        $data = Course::find($id);
        $datalist = Category::all();
        $setting = Setting::first();
        return view ('home.user.course.edit',
        [
            'data' => $data,
            'datalist' => $datalist,
            'setting' =>$setting
        ]);
    }

    public function courseupdate(Request $request, Course $course, $id)
    {
        //
        $data = Course::find($id);
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->price = $request->price;
        if($request->hasFile('image'))
        {
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect('userpanel/createdcourses');
    }

    public function contentindex($pid)
    {
        //
        $setting = Setting::first();
        $data = DB::table('contents')->where('course_id', $pid)->get(); 
        return view ('home.user.content.index',[
            'data' => $data,
            'pid' => $pid,
            'setting' => $setting
        ]);
    }

    public function contentcreate($pid)
    {
        //
        $setting = Setting::first();
        return view ('home.user.content.create',[
            'data' => $pid,
            'setting' => $setting
        ]);
    }

    public function contentstore(Request $request)
    {
        $data= new Content();
        $data->user_id = Auth::id();
        $data->course_id = $_POST['course_id'];
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $_POST['detail'];
        $data->file = $request->file;
        $data->videolink = $request->videolink;
        $data->status = 'True';
        if($request->hasFile('image'))
        {
            $data->image = $request->file('image')->store('images');
        }
        if($request->hasFile('file'))
        {
            $data->file = $request->file('file')->store('videos');
        }
        $data->save();
        return redirect()->route('userpanel.contentindex', ['id'=>$_POST['course_id']]);
    }

    public function contentdestroy($pid, $id)
    {
        //
        $data = Content:: find($id);
        if($data->image && Storage::disk('public')->exists($data->image))
        {
            Storage::delete($data->image);
        }
        if($data->file && Storage::disk('public')->exists($data->file))
        {
            Storage::delete($data->file);
        }
        $data->delete();
        return redirect()->route('userpanel.contentindex', ['id'=>$pid]);
    }

    public function contentedit(Content $content, $id)
    {
        //
        $data = Content::find($id);
        $setting = Setting::first();
        return view ('home.user.content.edit',
        [
            'data' => $data,
            'setting' => $setting
        ]);
    }

    public function contentupdate(Request $request, Content $content, $id)
    {
        //
        $data = Content::find($id);
        $data->user_id = Auth::id();
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $_POST['detail'];
        $data->file = $request->file;
        $data->videolink = $request->videolink;
        if($request->hasFile('image'))
        {
            $data->image = $request->file('image')->store('images');
        }
        if($request->hasFile('file'))
        {
            $data->file = $request->file('file')->store('videos');
        }
        $data->save();
        return redirect()->route('userpanel.contentindex', ['id' => $data->course_id]);
    }

    public function showcontent(Content $content, $id)
    {
        //
        $data = Content::find($id);
        $setting = Setting::first();
        return view ('home.user.content.show',['data' => $data,
        'setting' => $setting]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
