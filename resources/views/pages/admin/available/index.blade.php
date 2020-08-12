@extends('admin.layouts.master')
@section('section-title','Index Of Available')
@section('section-breadcrumb','Available')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <!-- Button trigger modal Add -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_feature">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Add Available
        </button>
        <!-- Modal Add -->
        <div class="modal fade" id="add_feature" tabindex="-1" role="dialog" aria-labelledby="add_feature_label"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_feature_label">Add Available</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('available.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="day">Day</label>
                                <input type="text" class="form-control @error('day') is-invalid @enderror" name="day"
                                    id="day" value="{{ old('day') }}">
                                @error('day')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" class="form-control @error('time') is-invalid @enderror" name="time"
                                    id="time" value="{{ old('time') }}">
                                @error('time')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
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
                        <th>Day</th>
                        <th>Time</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($availables as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->day }}</td>
                            <td>{{ $item->time }}</td>
                            <td class="text-center">
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#edit_feature{{ $loop->iteration }}">
                                    Edit
                                </button>
                                <!-- Button trigger modal Delete-->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{ $loop->iteration }}">
                                    Delete
                                </button>
                            </td>
                            <!-- Modal Edit-->
                            <div class="modal fade" id="edit_feature{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="edit_feature_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_feature_label">Edit Available</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('available.update',$item->id) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="day">Day</label>
                                                    <input type="text"
                                                        class="form-control @error('day') is-invalid @enderror"
                                                        name="day" id="day" value="{{ old('day')??$item->day }}">
                                                    @error('day')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="time">Time</label>
                                                    <input type="text"
                                                        class="form-control @error('time') is-invalid @enderror"
                                                        name="time" id="time"
                                                        value="{{ old('time')??$item->time }}">
                                                    @error('time')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
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
                            <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('available.destroy',$item->id) }}"
                                            method="POST" class="d-inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-body">
                                                Delete This Available?? {{ $item->day }} | {{$item->time}}
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
