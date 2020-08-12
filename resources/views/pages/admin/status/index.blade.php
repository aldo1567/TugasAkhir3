@extends('admin.layouts.master')
@section('section-title','Index Of Statuses')
@section('section-breadcrumb','Status')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{-- <!-- Button trigger modal Add -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_status">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Add New Status
        </button>

        <!-- Modal Add -->
        <div class="modal fade" id="add_status" tabindex="-1" role="dialog" aria-labelledby="add_status_label"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_status">Add New Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('status.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror"
                                value="{{ old('status') }}">
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                        {{-- <th colspan="2" class="text-center">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($status as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->status }}</td>
                            {{-- <td align="center">
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#edit_status{{ $loop->iteration }}">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                            </td>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="edit_status{{ $loop->iteration }}" tabindex="-1" role="dialog"
                                aria-labelledby="edit_status_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_status_label">Edit Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('status.update',$item->id) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <label for="status">Status</label>
                                                <input type="text" name="status" id="status"
                                                    class="form-control @error('status') is-invalid @enderror"
                                                    value="{{ old('status') ?? $item->status }}">
                                                @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <td align="center">
                                <!-- Button trigger modal Delete -->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#delte_status{{$loop->iteration}}">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </button>
                            </td>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="delte_status{{$loop->iteration}}" tabindex="-1" role="dialog"
                                aria-labelledby="delete_status_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete_status_label">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('status.destroy',$item->id) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-body">
                                                <strong>Delete This <u>{{$item->status}}</u> status??</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
