<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::latest()->get();

        return inertia('course/Index', compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return inertia('course/Add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        //
        $this->authorize('create',Post::class);
        $request->validated();
        if($request->photo != '') {
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('img/upload/').$name);
            $request->merge(['photo' => $name]);
        }
      
        Course::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'photo' => $request->photo
        ]);
        // Flash a success message to the session
        $request->session()->flash('message', 'Course has been added successful!');
        return redirect()->route('courses.index');  

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        return inertia('course/Edit', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        //
        $this->authorize('create',Post::class);

        $request->validated();
        $currentPhoto = $course->photo;
        if( $request->photo != $currentPhoto ) {
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('img/upload/').$name);
            $request->merge(['photo' => $name]);
            $catPhoto = public_path('img/upload/').$currentPhoto;

            if(file_exists($catPhoto)) {
                @unlink($catPhoto);
            }
        }

        $course->category = $request->category;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->photo = $request->photo;

        $course->update();
       
        return redirect()->route('courses.index')->with('message', 'Course has been updated successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $currentPhoto = $course->photo;
        $coursePhoto = public_path('img/upload/').$currentPhoto;

        if(file_exists($coursePhoto)) {
            @unlink($coursePhoto);
        }
        
        $course->delete();
        // Flash a success message to the session
        return redirect()->route('courses.index')->with('message', 'Course has been deleted successful!');
    }
}
