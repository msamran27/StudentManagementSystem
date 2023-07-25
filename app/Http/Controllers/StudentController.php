<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCourses(Student $student)
    {
        $student = Student::with('courses')->first();
        return view('student-courses', compact('student'));
    }

    public function index(){
        $students= Student::orderBy('id', 'desc')->paginate(10);
        return view('students',compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-student');
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
            'full_name' => ['required', 'string', 'min:3', 'max:191'],
            'cnic' => ['required', 'string', 'min:1'],
            'date_of_birth' => ['required', 'date'],
            'age' => ['required', 'integer'],
            'gender' => ['required', 'in:male,female,other'],
            'course_ids' => ['required', 'string']
        ]);
        $student = Student::create($request->all());
        $courseIds = explode(',', $request->course_ids);
        $student->courses()->sync($courseIds);

        return 'data saved successfully';
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
        $student= Student::find($id);
        return view('edit-student', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'min:3', 'max:191'],
            'cnic' => ['required', 'string', 'min:1'],
            'date_of_birth' => ['required', 'date'],
            'age' => ['required', 'integer'],
            'gender' => ['required', 'in:male,female,other'],
            'course_ids' => ['required', 'array', 'exists:courses,id']
        ]);

        $student->update($request->all());

        $student->courses()->sync($request->course_ids);

        return 'Student updated Successfully';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back()->with('saved', 'Student deleted Successfully');
    }
}
