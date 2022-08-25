@extends('master')

@section('title')
    Edit Students
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1><b>Edit:</b> {{ $student->full_name }}</h1>
                @if(session()->has('saved'))
                    <div class="alert alert-success">
                        {{ session()->get('saved') }}
                    </div>
                @endif

                <form action="{{ url('update-student') . '/' . $student->id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input type="full_name" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name" value='{{ $student->full_name }}'>
                        @error('full_name')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cnic">CNIC:</label>
                        <input type="text" class="form-control" id="cnic" data-inputmask="'mask': '99999-9999999-9'"  placeholder="eg. 31303-3131313-7" name="cnic" value='{{ $student->cnic }}'>
                        @error('cnic')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value='{{ $student->date_of_birth }}'>
                        @error('date_of_birth')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" id="age" placeholder="Age" name="age" value='{{ $student->age }}'>
                        @error('age')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="course_ids">Select Courses:</label>
                        <select name="course_ids[]" id="course_ids" class="form-control select2" multiple="multiple">
                            @foreach ($student->courses as $course)
                                <option value="{{ $course->id }}" selected>{{ $course->full_title }}</option>
                            @endforeach

                            @foreach (App\Models\Course::get() as $course)
                                <option value="{{ $course->id }}">{{ $course->full_title }}</option>
                            @endforeach

                        </select>
                        @error('course_ids')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#course_ids').select2();
    </script>
@endsection
