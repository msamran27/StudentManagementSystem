@extends('master')

@section('title')
    Edit course
@endsection
<h1><b>Edit:</b> {{$course->course_code }}</h1>
@section('body')
    <div class="container">
        <div class="row">
            <h1><b>Edit:</b> {{ $course->full_title }}</h1>
            <div class="col-sm-4">
                <h1> update course</h1>
                <form action="{{ url('update-course') . '/' . $course->id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="course_code">Course Code:</label>
                        <input type="text" class="form-control" id="course_code" placeholder="Enter Course Code" name="course_code" value= {{$course->course_code }}>
                        @error('course_code')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="full_title">Full Title:</label>
                        <input type="text" class="form-control" id="full_title" placeholder="Enter Full Title"  name="full_title" value= {{$course->full_title }}>
                        @error('full_title')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="credit_hours">Credit Hours:</label>
                        <input type="integer" class="form-control" id="credit_hours" placeholder="Enter Credit Hours" name="credit_hours" value={{$course->credit_hours }}>
                        @error('credit_hours')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
        </div>
    </div>
@endsection
