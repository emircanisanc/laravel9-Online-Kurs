<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
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
        $sliderdata=Category::all();
        $courses=Course::all();
        return view('home.index', [
            'sliderdata'=>$sliderdata,
            'courses'=>$courses
        ]);
    }

    public function test()
    {
        return view('home.test');
    }

    public function course($id)
    {
        $data = Course::find($id);
        $images = DB::table('images')->where('content_id', $id)->get(); 
        return view('home.course',
        [
            'data' => $data,
            'images' => $images
        ]);
    }

    public function categorycourses($id)
    {
        $category = Category::find($id);
        $courselist = DB::table('courses')->where('category_id', $id)->get(); 
        return view('home.categorycourses',
        [
            'category' => $category,
            'courselist' => $courselist
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
}
