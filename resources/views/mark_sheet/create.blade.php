@extends('layouts.admin.app')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Teacher</h3>
    </div>
    <div class="block-content">
        <form action="{{route('mark_sheet.store')}}" method="POST">
            @csrf
            <!-- Basic Elements -->
            <h2 class="content-heading pt-0">Create</h2>
            <div class="row push">
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-select-floating">Student <span class="text-danger">*</span></label>
                        <select class="form-select" name="student_id" id="example-select-floating" name="example-select-floating" aria-label="Floating label select example" required>
                            <option selected>Select a student</option>
                            @foreach ($students as $student )
                            <option value="{{$student->id}}">{{ucfirst($student->name)}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-select-floating">Term <span class="text-danger">*</span></label>
                        <select class="form-select" name="term" id="example-select-floating" name="example-select-floating" aria-label="Floating label select example" required>
                            <option selected>Select a term</option>
                            @foreach ($terms as $key=>$term)
                            <option value="{{$key}}">{{ucfirst($term)}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-text-input">Maths <span class="text-danger">*</span></label>
                        <input type="number" value="{{ Request::old('maths') }}" class="form-control" id="example-text-input" max="100" name="maths" placeholder="Maths">
                    </div>
                </div>
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-text-input">Science <span class="text-danger">*</span></label>
                        <input type="number" value="{{ Request::old('science') }}" class="form-control" id="example-text-input" max="100" name="science" placeholder="Science">
                    </div>
                </div>
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-text-input">History <span class="text-danger">*</span></label>
                        <input type="number" value="{{ Request::old('history') }}" class="form-control" id="example-text-input" max="100" name="history" placeholder="History">
                    </div>
                </div>
            </div>
            <div class="row push">
                <div class="col-lg-8 col-xl-5 offset-lg-4">
                    <div class="mb-4">
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-check-circle opacity-50 me-1"></i> Add
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