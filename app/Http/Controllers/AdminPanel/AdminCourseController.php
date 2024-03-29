<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class AdminCourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Course::all();
        return view ('admin.course.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Category::all();
        $users = User::all();
        return view ('admin.course.create',['data' => $data, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data= new Course();
        $data->user_id = $request->user_id;
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $_POST['detail'];
        $data->price = $request->price;
        $data->status = $request->status;
        if($request->hasFile('image'))
        {
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect('admin/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Course $category, $id)
    {
        //
        $data = Course::find($id);
        return view ('admin.course.show',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, $id)
    {
        //
        $data = Course::find($id);
        $datalist = Category::all();
        $users = User::all();
        return view ('admin.course.edit',
        [
            'data' => $data,
            'datalist' => $datalist,
            'users'=>$users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, $id)
    {
        //
        $data = Course::find($id);
        $data->user_id = $request->user_id;
        $data->category_id = $request->category_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->status = $request->status;
        if($request->hasFile('image'))
        {
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect('admin/course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, $id)
    {
        //
        $data = Course:: find($id);
        if($data->image && Storage::disk('public')->exists($data->image))
        {
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect('admin/course');

    }
}
