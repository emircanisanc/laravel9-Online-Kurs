<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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

    public function param($id)
    {
        echo "Parameter 1:", $id;
        return view('home.test2',
        [
            'id' => $id
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
