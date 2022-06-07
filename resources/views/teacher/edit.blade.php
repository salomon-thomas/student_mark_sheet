@extends('layouts.admin.app')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Teacher</h3>
    </div>
    <div class="block-content">
        <form action="{{route('teacher.update',['id'=>$id])}}" method="POST">
            @csrf
            @method('PATCH')
            <!-- Basic Elements -->
            <h2 class="content-heading pt-0">Edit</h2>
            <div class="row push">
                <div class="col-lg-12 col-xl-5">
                    <div class="mb-4">
                        <label class="form-label" for="example-text-input">Name</label>
                        <input type="text" value="{{ Request::old('name')??$data->name }}" class="form-control" id="example-text-input" name="name" placeholder="Name">
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