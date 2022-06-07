@extends('layouts.admin.app')

@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Mark Sheet</h3>
        <div class="block-options">
            <a href="{{route('mark_sheet.create')}}" class="btn btn-primary">
                Add
            </a>
        </div>
    </div>
    <div class="block-content block-content-full">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th>Student</th>
                        <th>Maths</th>
                        <th>Science</th>
                        <th>History</th>
                        <th>Total</th>
                        <th>Term</th>
                        <th style="width: 15%;">Created At</th>
                        <th class="text-center" style="width: 100px;">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $index = ($data->currentPage() - 1) * $data->perPage() + 1; ?>
                    @foreach ($data as $temp )
                    <tr>
                        <td class="text-center">{{$index++}}</td>
                        <td class="fw-semibold">
                            <a href="#">{{$temp->student->name}}</a>
                        </td>
                        <td>
                            {{$temp->maths}}
                        </td>
                        <td>
                            {{$temp->science}}
                        </td>
                        <td>
                            {{$temp->history}}
                        </td>
                        <td>
                            {{$temp->total}}
                        </td>
                        <td>
                            {{$terms[$temp->term]}}
                        </td>
                        <td>
                            @if($temp->created_at->diff(Carbon\Carbon::now())->days<=2) <em class="text-muted">{{ Carbon\Carbon::parse($temp->created_at)->diffForHumans()}} </em>
                                @else
                                <em class="text-muted">{{ Carbon\Carbon::parse($temp->created_at)->format('d-m-Y h:i a')}} </em>
                                @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{route('mark_sheet.edit',['id'=>$temp->id])}}" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <div class="btn-group">
                                    <a href="{{route('mark_sheet.delete',['id'=>$temp->id])}}" onclick="return confirm(' Do you wish to delete?');" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>
</div>
@endsection
@section('page_script')
<script src={{ asset('theme/admin/js/be_tables_datatables.min.js")}"></script>
@endsection