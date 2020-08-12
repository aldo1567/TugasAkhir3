@extends('admin.layouts.master')
@section('section-title','Index Of Session')
@section('section-breadcrumb','Session')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <!-- Button trigger modal Add -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_session">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Add Session
        </button>

        <!-- Modal Add -->
        <div class="modal fade" id="add_session" tabindex="-1" role="dialog" aria-labelledby="add_session_label"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_session_label">Add Session</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('session.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="work_id">Work Day</label>
                            <select name="work_id" id="work_id"
                                class="form-control @error('work_id') is-invalid @enderror">
                                <option value="" selected disabled>---Select---</option>
                                @foreach($work as $date)
                                    <option value="{{ $date->id }}"
                                        {{ old('work_id')==$date->id?'selected':'' }}>
                                        {{ $date->date }}</option>
                                @endforeach
                            </select>
                            @error('work_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="session_start">Session Start At</label>
                            <input type="time" name="session_start" id="session_start"
                                class="form-control @error('session_start') is-invalid @enderror"
                                value="{{ old('session_start') }}">
                            @error('session_start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="session_end">Session End At</label>
                            <input type="time" name="session_end" id="session_end"
                                class="form-control @error('session_end') is-invalid @enderror"
                                value="{{ old('session_end') }}">
                            @error('session_end')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="capacity">Capacity</label>
                            <input type="number" name="capacity" id="capacity"
                                class="form-control @error('capacity') is-invalid @enderror"
                                value="{{ old('capacity') }}">
                            @error('capacity')
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
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Work Days</th>
                        <th>Session Start</th>
                        <th>Session End</th>
                        <th>Capacity</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($session as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->workDay->date }}</td>
                            <td>{{ date('g:i A',strtotime($item->session_start)) }}</td>
                            <td>{{ date('g:i A',strtotime($item->session_end)) }}</td>
                            <td>Max {{ $item->capacity }} <i class="fas fa-male fa-lg text-primary"></i>
                                <strong>|</strong> <i class="fa fa-female fa-lg text-danger" aria-hidden="true"></i>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#edit_session{{ $loop->iteration }}">
                                    Edit
                                </button>
                                <!-- Button trigger modal Delete-->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{$loop->iteration}}">
                                    Delete
                                </button>

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
                                            <form action="{{ route('session.destroy',$item->id) }}"
                                                method="POST" class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                            <div class="modal-body">
                                                Delete This Session?? {{ $item->workDay->date }}|{{ date('g:i A',strtotime($item->session_start)) }}-{{ date('g:i A',strtotime($item->session_end)) }}
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
                            </td>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="edit_session{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="edit_session_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_session_label">Edit Sesison</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('session.update',$item->id) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <label for="work_id">Work Day</label>
                                                <select name="work_id" id="work_id" class="form-control">
                                                    <option value="" selected disabled>---Select---</option>
                                                    @foreach($work as $date)
                                                        <option value="{{ $date->id }}"
                                                            {{ (old('work_id')??$item->work_id)==$date->id?'selected':'' }}>
                                                            {{ $date->date }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="session_start">Session Start At</label>
                                                <input type="time" name="session_start" id="session_start"
                                                    class="form-control"
                                                    value="{{ old('session_start')??$item->session_start }}">
                                                <label for="session_end">Session End At</label>
                                                <input type="time" name="session_end" id="session_end"
                                                    class="form-control"
                                                    value="{{ old('session_end')??$item->session_end }}">
                                                <label for="capacity">Capacity</label>
                                                <input type="number" name="capacity" id="capacity" class="form-control"
                                                    value="{{ old('capacity')??$item->capacity }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
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
