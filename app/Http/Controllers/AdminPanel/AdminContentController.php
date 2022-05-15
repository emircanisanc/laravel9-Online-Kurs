<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class AdminContentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Content::all();
        return view ('admin.content.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Course::all();
        return view ('admin.content.create',['data' => $data]);
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
        $data= new Content();
        $data->user_id = $request->user_id;
        $data->course_id = $request->course_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->file = $request->file;
        $data->videolink = $request->videolink;
        $data->status = $request->status;
        if($request->hasFile('image'))
        {
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect('admin/content');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content, $id)
    {
        //
        $data = Content::find($id);
        return view ('admin.content.show',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content, $id)
    {
        //
        $data = Content::find($id);
        $datalist = Course::all();
        return view ('admin.content.edit',
        [
            'data' => $data,
            'datalist' => $datalist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content, $id)
    {
        //
        $data = Content::find($id);
        $data->user_id = $request->user_id;
        $data->course_id = $request->course_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->file = $request->file;
        $data->videolink = $request->videolink;
        $data->status = $request->status;
        if($request->hasFile('image'))
        {
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect('admin/content');
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
        $data = Content:: find($id);
        if($data->image && Storage::disk('public')->exists($data->image))
        {
            Storage::delete($data->image);
        }
        $data->delete();
        return redirect('admin/content');

    }
}
