@extends('admin.layouts.master')
@section('section-title','Index Of Qualites')
@section('section-breadcrumb','Quality')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <!-- Button trigger modal Add -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_quality">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Add Quality
        </button>

        <!-- Modal Add -->
        <div class="modal fade" id="add_quality" tabindex="-1" role="dialog" aria-labelledby="add_quality_label"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_quality_label">Add Quality</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('quality.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" value="{{ old('title') }}">
                            @error('title')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon"
                                id="icon" value="{{ old('icon') }}">
                            @error('icon')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                            <label for="desc">Description</label>
                            {{-- <input type="text" class="form-control @error('desc') is-invalid @enderror" name="desc"
                                id="desc" value="{{ old('desc') }}"> --}}
                            <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">
                                    {{ old('desc') }}
                                </textarea>
                            @error('desc')
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
                        <th>Title</th>
                        <th>Icon Class</th>
                        <th>Description</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($qualities as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->icon }}</td>
                            <td>{!! Illuminate\Support\Str::of($item->desc)->limit(20) !!}</td>
                            <td class="text-center">
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#edit_quality{{ $loop->iteration }}">
                                    Edit
                                </button>
                                <!-- Button trigger modal Delete -->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModal{{ $loop->iteration }}">
                                    Delete
                                </button>
                            </td>
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
                                        <form action="{{ route('quality.destroy',$item->id) }}"
                                            method="POST" class="d-inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <div class="modal-body">
                                                Delete This Quality?? {{ $item->title }}
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
                            <!-- Modal Edit-->
                            <div class="modal fade" id="edit_quality{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="edit_quality_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_quality_label">Edit Quality</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('quality.update',$item->id) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <label for="title">Title</label>
                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    name="title" id="title"
                                                    value="{{ old('title')??$item->title }}">
                                                @error('title')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                                <label for="icon">Icon</label>
                                                <input type="text"
                                                    class="form-control @error('icon') is-invalid @enderror" name="icon"
                                                    id="icon"
                                                    value="{{ old('icon')??$item->icon }}">
                                                @error('icon')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                                <label for="desc">Description</label>
                                                {{-- <input type="text"
                                                    class="form-control @error('desc') is-invalid @enderror" name="desc"
                                                    id="desc"
                                                    value="{{ old('desc')??$item->desc }}">
                                                --}}
                                                <textarea name="desc" id="desc"
                                                    class="form-control @error('desc') is-invalid @enderror">
                                                        {{ old('desc')??$item->desc }}
                                                    </textarea>
                                                @error('desc')
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
@section('ckeditor')
<script>
    CKEDITOR.replaceAll();

</script>
@endsection
