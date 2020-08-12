@extends('admin.layouts.master')
@section('section-title','Index Of Doctors')
@section('section-breadcrumb','Doctor')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <!-- Button trigger modal Add -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_doctor">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Add Doctor
        </button>

        <!-- Modal Add -->
        <div class="modal fade" id="add_doctor" tabindex="-1" role="dialog" aria-labelledby="add_doctor_label"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_doctor_label">Add Doctor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('doctor.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ old('name') }}">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="modal-body">
                            <label for="specialist">Specialities</label>
                            <input type="text" class="form-control @error('specialist') is-invalid @enderror"
                                name="specialist" id="specialist" value="{{ old('specialist') }}">
                            @error('specialist')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="modal-body">
                            <label for="img">Images</label>
                            <input type="file" class="form-control-file @error('img') is-invalid @enderror" name="img"
                                id="img" value="{{ old('img') }}">
                            @error('img')
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
                        <th>Doctors</th>
                        <th>Specialities</th>
                        <th>Images</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $item)
                        <tr>
                            <td style="vertical-align:middle">{{ $loop->iteration }}</td>
                            <td style="vertical-align:middle">{{ $item->name }}</td>
                            <td style="vertical-align:middle">{{ $item->specialist }}</td>
                            <td align="center"><img src="{{ Storage::url($item->img) }}" alt=""
                                    class="img-thumbnail" style="width:150px;height:auto"></td>
                            <td style="vertical-align:middle" class="text-center">
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#edit_doctor{{ $loop->iteration }}">
                                    Edit
                                </button>
                                <!-- Button trigger modal Delete -->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{ $loop->iteration }}">
                                    Delete
                                </button>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form
                                                action="{{ route('doctor.destroy',$item->id) }}"
                                                method="POST" class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-body">
                                                    Delete This Doctor?? {{$item->name}}
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
                            <!-- Modal Edit-->
                            <div class="modal fade" id="edit_doctor{{ $loop->iteration }}" tabindex="-1" role="dialog"
                                aria-labelledby="edit_doctor_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_doctor_label">Edit Doctor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('doctor.update',$item->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <label for="name">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    id="name"
                                                    value="{{ old('name')??$item->name }}">
                                                @error('name')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="modal-body">
                                                <label for="specialist">Specialities</label>
                                                <input type="text"
                                                    class="form-control @error('specialist') is-invalid @enderror"
                                                    name="specialist" id="specialist"
                                                    value="{{ old('specialist')??$item->specialist }}">
                                                @error('specialist')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="modal-body">
                                                <label for="img">Images</label>
                                                <input type="file"
                                                    class="form-control-file @error('img') is-invalid @enderror"
                                                    name="img" id="img"
                                                    value="{{ old('img')??$item->img }}">
                                                @error('img')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Update</button>
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
