@extends('master')

@section('body')


    <a href="{{ url('create-student') }}" class="btn btn-primary btn-lg" style="margin-bottom: 40px">Add New Student</a>

    <h1>All Students list</h1>
    @if(session()->has('saved'))
        <div class="alert alert-success">
            {{ session()->get('saved') }}
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">CNIC</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Show Courses</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $student->id }}</th>
                <th>{{ $student->full_name }}</th>
                <td>{{ $student->cnic }}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->gender }}</td>
                <td><a href="{{ url('show-courses') .'/' . $student->id }}">show courses</a></td>
                <td><a href="{{ url('edit-student') .'/' . $student->id }}">Edit</a></td>
                <td>
                    <form action="{{ url('delete-student') .'/' . $student->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links('pagination::bootstrap-4') }}
@endsection
