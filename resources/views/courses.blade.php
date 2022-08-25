@extends('master')

@section('body')
    @php
        $courses =App\Models\Course::paginate(10);
    @endphp
    <a href="{{ url('create-course') }}" class="btn btn-info btn-lg" style="margin-bottom: 40px">Add New Course</a>
    
    <h1>All Courses list</h1>

    @if(session()->has('saved'))
        <div class="alert alert-success">
            {{ session()->get('saved') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Course Code</th>
            <th scope="col">Full Title</th>
            <th scope="col">Credit Hours</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <th scope="row">{{ $course->course_code }}</th>
                <td>{{ $course->full_title }}</td>
                <td>{{ $course->credit_hours }}</td>
                <td><a href="{{ url('edit-course')  .'/' . $course->id}}">Edit</a></td>
                <td>
                    <form action="{{ url('delete-course') .'/' . $course->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>

    {{ $courses->links('pagination::bootstrap-4') }}
@endsection