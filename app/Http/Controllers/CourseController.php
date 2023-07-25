<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_code' => ['required', 'string', 'min:1', 'max:191'],
            'full_title' => ['required', 'string', 'min:1'],
            'credit_hours' => ['required', 'integer'],
        ]);

        $course = Course::create($request->all());

        if ($course->exists) {
            $saved = 'Student Added Successfully';
            return redirect('courses')->with('saved', $saved);
        }

        return 'Something went wrong';
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
    public function edit(Course $course,$id)
    {
        $course = Course::find($id);
        return view('edit-course', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Course $course)
    {
        $request->validate([
            'course_code' => ['required', 'string', 'min:1', 'max:191'],
            'full_title' => ['required', 'string', 'min:1'],
            'credit_hours' => ['required', 'integer'],
        ]);

        $course->update($request->all());

        if ($course->exists) {
            $saved = 'Student Added Successfully';
            return redirect('courses')->with('saved', $saved);
        }

        return 'Something went wrong';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->back()->with('saved', 'Course deleted Successfully');
    }
}
