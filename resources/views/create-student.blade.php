@extends('master')

@section('title')
    Create Students
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1>Create New Student</h1>
                    <form action="#" id="createStudent">
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input type="full_name" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name" value='{{ old('full_name') }}'>
                        @error('full_name')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cnic">CNIC:</label>
                        <input type="text" class="form-control" id="cnic" data-inputmask="'mask': '99999-9999999-9'" placeholder="eg. 31303-3131313-7" name="cnic" value='{{ old('cnic') }}'>
                        @error('cnic')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value='{{ old('date_of_birth') }}'>
                        @error('date_of_birth')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" class="form-control" id="age" placeholder="Age" name="age" value='{{ old('age') }}'>
                        @error('age')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" class="form-control" value='{{ old('gender') }}'>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @error('gender')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="course_ids">Select Courses:</label>
                        <select name="course_ids[]" id="course_ids" class="form-control select2" multiple="multiple">
                            @foreach (App\Models\Course::get() as $course)
                                <option value="{{ $course->id }}">{{ $course->full_title }}</option>
                            @endforeach
                        </select>
                        @error('course_ids')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-primary"onclick="submitForm()" value="Submit">Create new student</button>
                    </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $('#course_ids').select2();
    $("#cnic").inputmask();

    function submitForm() {
        let form_data = new FormData();

        let full_name = $('#full_name').val();
        form_data.append('full_name', full_name);

        let cnic = $('#cnic').val();
        form_data.append('cnic', cnic);

        let date_of_birth = $('#date_of_birth').val();
        form_data.append('date_of_birth', date_of_birth);

        let age = $('#age').val();
        form_data.append('age', age);

        let gender = $( "#gender option:selected" ).val();
        form_data.append('gender',gender);

        var course_ids = $('#course_ids').val();
        form_data.append('course_ids',course_ids);

        console.log(form_data);

        $.ajax({
            url: "{{ url('store-student') }}",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            processData: false,
            contentType: false,
            cache: false,
            data: form_data,
            success: (response) => {
                $(':input','#createStudent').not(':button, :submit, :reset, :hidden').val('').prop('checked', false).prop('selected', false);

                alert('data saved');
            },
            error: (error) => {
                alert('Error')
            }

        });
    }
</script>
@endsection
