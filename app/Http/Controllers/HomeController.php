<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public static function maincategorylist()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    //
    public function index()
    {
        $sliderdata=$this->maincategorylist();
        $popularcategories=Category::skip(3)->limit(6)->get();
        $courses=Course::latest()->take(5)->get();
        $popularComments=Comment::limit(3)->where('rate', 5)->get();
        $setting=Setting::first();
        return view('home.index', [
            'sliderdata'=>$sliderdata,
            'courses'=>$courses,
            'setting'=>$setting,
            'popularcategories' => $popularcategories,
            'popularComments' => $popularComments
        ]);
    }

    public function about()
    {
        $setting=Setting::first();
        return view('home.about', [
            'setting'=>$setting 
        ]);
    }

    public function faq()
    {
        $setting=Setting::first();
        $datalist = Faq::all();
        return view('home.faq', [
            'datalist'=>$datalist,
            'setting'=>$setting
        ]);
    }

    public function contact()
    {
        $setting=Setting::first();
        return view('home.contact', [
            'setting'=>$setting 
        ]);
    }

    public function storemessage(Request $request)
    {
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = $request->ip();
        $data->save();

        return redirect()->route('contact')->with('info', 'Your message has been sent, Thank you.');
    }

    public function storecomment(Request $request)
    {
        $data = new Comment();
        $data->user_id = Auth::id();
        $data->course_id = $request->input('course_id');
        $data->subject = $request->input('subject');
        $data->review = $request->input('review');
        $data->rate = $request->input('rate');
        $data->ip = $request->ip();
        $data->save();

        return redirect()->route('course', ['id'=> $request->input('course_id')])->with('info', 'Your comment has been sent, Thank you.');
    }

    public function references()
    {
        $setting=Setting::first();
        return view('home.references', [
            'setting'=>$setting 
        ]);
    }

    public function test()
    {
        return view('home.test');
    }

    public function course($id)
    {
        $setting=Setting::first();
        $data = Course::find($id);
        $commentlist = Comment::whereIn('course_id', [$id])->where('status', 'True')->get();
        return view('home.course',
        [
            'data' => $data,
            'commentlist' => $commentlist,
            'setting' => $setting
        ]);
    }

    public function categorycourses($id)
    {
        $setting=Setting::first();
        $category = Category::find($id);
        $courselist = DB::table('courses')->where('category_id', $id)->get(); 
        return view('home.categorycourses',
        [
            'category' => $category,
            'courselist' => $courselist,
            'setting' => $setting
        ]);
    }

    public function save(Request $request)
    {
        echo "Save function";
        return view('home.test2',
        [
            'id' => $_REQUEST["fname"]
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function registeruser()
    {
        $setting=Setting::first();
        return view('home.register', [
            'setting'=>$setting 
        ]);
    }

    public function loginuser()
    {
        $setting=Setting::first();
        return view('home.login', [
            'setting'=>$setting 
        ]);
    }

    public function loginadmincheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/admin');
        }
 
        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
