@extends('layouts.admin.app')

@section('content')
<div class="row items-push">
    <div class="col-sm-6 col-xl-4">
        <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
            <div class="block-content block-content-full flex-grow-1">
                <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-users fa-lg text-primary"></i>
                </div>
                <div class="fs-1 fw-bold">{{$students}}</div>
                <div class="text-muted mb-3">Students</div>
            </div>
            <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                <a class="fw-medium" href="{{route('student.index')}}">
                    View all
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
            <div class="block-content block-content-full flex-grow-1">
                <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-list-alt fa-lg text-primary"></i>
                </div>
                <div class="fs-1 fw-bold">{{$mark_sheets}}</div>
                <div class="text-muted mb-3">Mark Sheets</div>
            </div>
            <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                <a class="fw-medium" href="{{route('teacher.index')}}">
                    View All
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
            <div class="block-content block-content-full flex-grow-1">
                <div class="item rounded-3 bg-body mx-auto my-3">
                    <i class="fa fa-user fa-lg text-primary"></i>
                </div>
                <div class="fs-1 fw-bold">{{$teachers}}</div>
                <div class="text-muted mb-3">Teachers</div>
            </div>
            <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                <a class="fw-medium" href="{{route('mark_sheet.index')}}">
                    View all
                    <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection