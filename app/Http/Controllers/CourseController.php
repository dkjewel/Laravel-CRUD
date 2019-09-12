<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::with('department')->latest()->paginate(5);

        return view('admin.course.index', compact('courses'));
    }


    public function create()
    {
        $departments = Department::all();

        return view('admin.course.create', compact('departments'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'department_id' => 'required',
            'course_name' => 'required|unique:courses',

        ]);

        Course::create($request->all());

        return redirect()->route('course.create')
            ->with(['message' => 'Course Info Saved Successfully']);

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $course = Course::with('department')->find($id);
        $departments = Department::all();

        return view('admin.course.edit',compact('course','departments'));
    }


    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $this->validate($request, [

            'department_id' => 'required',
            'course_name' => 'required|unique:courses,course_name,'.$course->id,

        ]);


        $course->update($request->all());

        return redirect()->route('course.index')
            ->with(['message' => 'Course Info Updated Successfully']);

    }


    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->route('course.index')
            ->with(['message' => 'Course Info Deleted Successfully']);

    }
}
