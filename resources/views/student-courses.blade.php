@extends('master')

@section('body')
    <h1 class="text-primary">Student Name: {{ $student->full_name }}</h1>
    <h2>View all courses details</h2>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Course Code</th>
            <th scope="col">Full Title</th>
            <th scope="col">Credit Hours</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($student->courses as $course)
            <tr>
                <th scope="row">{{ $course->id }}</th>
                <th>{{ $course->course_code }}</th>
                <td>{{ $course->full_title }}</td>
                <td>{{ $course->credit_hours }}</td>
            </tr>
            @endforeach
        </tbody>    
    </table>

@endsection