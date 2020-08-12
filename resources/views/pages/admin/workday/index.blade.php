@extends('admin.layouts.master')
@section('section-title','Index Of Work Days')
@section('section-breadcrumb','Work Days')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <!-- Button trigger modal Add -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_work">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Add Work Day
        </button>

        <!-- Modal Add -->
        <div class="modal fade" id="add_work" tabindex="-1" role="dialog" aria-labelledby="add_work_label"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_work_label">Add Work Day</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('workDay.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="date">Work Day</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                                id="date">
                            @error('date')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Work Days</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($work_day as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('m-d-Y',strtotime($item->date)) }}</td>
                            <td class="text-center">
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#edit_workday{{ $loop->iteration }}">
                                    Edit
                                </button>
                                <!-- Button trigger modal delete -->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{$loop->iteration}}">
                                    Delete
                                </button>
                            </td>
                            <!-- Modal Edit-->
                            <div class="modal fade" id="edit_workday{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="edit_workday_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_workday_label">Edit WorkDay</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('workDay.update',$item->id) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <label for="date">Work Day</label>
                                                <input type="date" class="form-control" name="date" id="date"
                                                    value="{{ $item->date }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                             <!-- Modal Delete -->
                             <div class="modal fade" id="exampleModal{{$loop->iteration}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                         <button type="button" class="close" data-dismiss="modal"
                                             aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                     </div>
                                     <form action="{{ route('workDay.destroy',$item->id) }}"
                                        method="POST" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                     <div class="modal-body">
                                         Delete This Data?? "{{ date('m-d-Y',strtotime($item->date)) }}"
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary"
                                             data-dismiss="modal">Close</button>
                                         <button type="submit" class="btn btn-danger">Delete</button>
                                     </div>
                                    </form>
                                 </div>
                             </div>
                         </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
