@extends('layouts.admin.app')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Student</h3>
    </div>
    <div class="block-content">
        <form action="{{route('student.update',['id'=>$id])}}" method="POST">
            @csrf
            @method('PATCH')
            <!-- Basic Elements -->
            <h2 class="content-heading pt-0">Edit</h2>
            <div class="row push">
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-text-input">Name<span class="text-danger">*</span></label>
                        <input type="text" value="{{ Request::old('name')??$data->name }}" class="form-control" id="example-text-input" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-text-input">Age <span class="text-danger">*</span></label>
                        <input type="number" value="{{ Request::old('age')??$data->age }}" class="form-control" id="example-text-input" name="age" placeholder="Age">
                    </div>
                </div>
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-select-floating">Gender <span class="text-danger">*</span></label>
                        <select class="form-select" name="gender" id="example-select-floating" name="example-select-floating" aria-label="Floating label select example" required>
                            <option selected>Select a gender</option>
                            @foreach ($genders as $gender )
                            <option value="{{$gender}}" {{ $data->gender==$gender?'selected':'' }}>{{ucfirst($gender)}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-select-floating">Teacher <span class="text-danger">*</span></label>
                        <select class="form-select" name="teacher_id" id="example-select-floating" name="example-select-floating" aria-label="Floating label select example" required>
                            <option selected>Select a teacher</option>
                            @foreach ($teachers as $teacher )
                            <option value="{{$teacher->id}}" {{ $data->teacher_id==$teacher->id?'selected':'' }}>{{ucfirst($teacher->name)}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </div>
            <div class="row push">
                <div class="col-lg-8 col-xl-5 offset-lg-4">
                    <div class="mb-4">
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-check-circle opacity-50 me-1"></i> Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('page_script')

@endsection