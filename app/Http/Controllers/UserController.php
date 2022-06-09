<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=Setting::first();
        return view('home.user.index',[
            'setting' => $setting
        ]);
    }

    public function comments()
    {
        $setting=Setting::first();
        $comments = Comment::where('user_id', '=', Auth::id())->get();
        return view('home.user.comments',[
            'setting' => $setting,
            'comments' => $comments
        ]);
    }

    public function courses()
    {
        $setting=Setting::first();
        $user = User::find(Auth::id());
        $courses = $user->courses;
        return view('home.user.courses',[
            'setting' => $setting,
            'courses' => $courses
        ]);
    }

    public function createdcourses()
    {
        $setting=Setting::first();
        $user = User::find(Auth::id());
        $courses = $user->createdCourses;
        return view('home.user.createdCourses',[
            'setting' => $setting,
            'courses' => $courses
        ]);
    }

    public function commentdestroy($id)
    {
        $setting=Setting::first();
        $data = Comment::find($id);
        $data->delete();
        return redirect(route('userpanel.comments'));
    }

    public function shopcart($id)
    {
        $setting=Setting::first();
        $data = Course::find($id);
        $user = User::find(Auth::id());
        return view('home.user.shopcart',[
            'setting' => $setting,
            'data' => $data,
            'user' => $user
        ]);
    }

    public function storeorder(Request $request)
    {
        $cardcheck = "True";

        if($cardcheck=='True')
        {
        $data = new Order();
        $data->course_id = $request->input('course_id');
        $data->user_id = Auth::id();
        $data->price = $request->input('price');
        $data->IP = $_SERVER['REMOTE_ADDR'];
        $data->save();
        
        return redirect()->route('userpanel.ordercomplete')->with('success', 'Course Order Successfuly');
        }
        else
        {
            return redirect()->route('userpanel.ordercomplete')->with('error', 'Your credit card is not valid');
        }
        
    }

    public function ordercomplete()
    {
        //
        $setting = Setting::first();
        return view('home.user.ordercomplete',['setting'=>$setting]);
    }

    public function orders()
    {
        $setting=Setting::first();
        $orders = Order::where('user_id', '=', Auth::id())->get();
        return view('home.user.orders',[
            'setting' => $setting,
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
