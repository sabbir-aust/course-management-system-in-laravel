<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Classes;
use App\Models\Faculty;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id')->with('category','classes','faculty')->latest()->paginate();
        ;
        return view ('course.index',compact('courses'));

    


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $classes = Classes::all();
        $faculties = Faculty::all();
        return view('course.create',compact('categories','classes','faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'course_code' => 'required',
            'course_name' => 'required',
            'category_id' => 'required',
            'classes_id' => 'required',
            'faculty_id' => 'required',
            'class_start_time' => 'required',
            'class_end_time' => 'required',
            'seatlimit' => 'required',
        ]);

        $created = Course::create([
           'course_code' => $request->course_code,
           'course_name' => $request->course_name,
           'category_id' => $request->category_id,
           'classes_id' => $request->classes_id,
           'faculty_id' => $request->faculty_id,
           'class_start_time' => $request->class_start_time,
           'class_end_time' => $request->class_end_time,
           'seatlimit' => $request->seatlimit,
        ]);

        if ($created){
            return redirect()->route('courses.index')->with('status','New Course added  successfully');
        }

        return redirect()->back()->with('status', 'Whoops! someting went wrong!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //$courses = Course::findOrFail($course->id);
        //$categories = Category::findOrFail($category->id);
        //$classes = Classes::findOrFail($class->id);
        //$faculties = Faculty::findOrFail($faculty->id);

        $courses = Course::findOrFail($course->id);
        $categories = Category::all();
        $classes = Classes::all();
        $faculties = Faculty::all();

        return view('course.edit', compact('courses','categories','classes','faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request,[
            'course_code' => 'required',
            'course_name' => 'required',
            'category_id' => 'required',
            'classes_id' => 'required',
            'faculty_id' => 'required',
            'class_start_time' => 'required',
            'class_end_time' => 'required',
            'seatlimit' => 'required',
        ]);

        $course = Course::find($course->id);
        $course->course_code = $request->course_code;
        $course->course_name = $request->course_name;
        $course->category_id = $request->category_id;
        $course->classes_id = $request->classes_id;
        $course->faculty_id = $request->faculty_id;
        $course->class_start_time = $request->class_start_time;
        $course->class_end_time = $request->class_end_time;
        $course->seatlimit = $request->seatlimit;

        if ($course->save()){
            return redirect()->back()->with('status','Course info updated');
        }

        return redirect()->back()->with('status','Whoops field!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $deleted = $course->delete();

        if ($deleted){
            return redirect()->back()->with('status','Deleted successfully');
        }
        return redirect()->back()->with('status','Whoops! Delete Fail!');
    }
}
