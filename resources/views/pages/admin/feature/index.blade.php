@extends('admin.layouts.master')
@section('section-title','Index Of Features')
@section('section-breadcrumb','Feature')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <!-- Button trigger modal Add -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_feature">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Add Feature
        </button>

        <!-- Modal Add -->
        <div class="modal fade" id="add_feature" tabindex="-1" role="dialog" aria-labelledby="add_feature_label"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_feature_label">Add Feature</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('feature.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="feature">Feature</label>
                            {{-- <input type="text" class="form-control @error('feature') is-invalid @enderror"
                                name="feature" id="feature" value="{{ old('feature') }}"> --}}
                            <textarea name="feature" id="feature"
                                class="form-control @error('feature') is-invalid @enderror">
                                    {{ old('feature') }}
                                </textarea>
                            @error('feature')
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
                        <th>Features</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($features as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! Illuminate\Support\Str::of($item->feature)->limit(20) !!}</td>
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
                                                action="{{ route('feature.destroy',$item->id) }}"
                                                method="POST" class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-body">
                                                    Delete This Feature?? {{ $item->feature }}
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
                            <div class="modal fade" id="edit_feature{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="edit_feature_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_feature_label">Edit Feature</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('feature.update',$item->id) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <label for="feature">Feature</label>
                                                {{-- <input type="feature"
                                                    class="form-control @error('date') is-invalid @enderror"
                                                    name="feature1" id="feature"
                                                    value="{{ old('feature')??$item->feature }}">
                                                --}}
                                                <textarea id="feature" name="feature">
                                                        {{ old('feature')??$item->feature }}
                                                    </textarea>
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
    CKEDITOR.replaceAll()
</script>
@endsection
