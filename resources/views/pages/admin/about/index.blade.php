@extends('admin.layouts.master')
@section('section-title','Index Of About')
@section('section-breadcrumb','About')
@section('content')
<div class="card mb-4">
    <div class="card-header">
       
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($about as $item)
                        <tr>
                            <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                            <td style="vertical-align: middle">{{ $item->title }}</td>
                            <td style="vertical-align: middle">{!! Illuminate\Support\Str::of($item->desc)->limit(20) !!}</td>
                            <td align="center">
                                <img src="{{ Storage::url($item->img) }}" alt="" class="img-thumbnail" style="width: 200px;height:200px">
                            </td>
                            <td class="text-center" style="vertical-align: middle">
                                <!-- Button trigger modal Edit -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#edit_feature{{ $loop->iteration }}">
                                    Edit
                                </button>
                            </td>
                            <!-- Modal Edit-->
                            <div class="modal fade" id="edit_feature{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="edit_feature_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_feature_label">Edit About</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('about.update',$item->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="day">Title</label>
                                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                                        id="title" value="{{ old('title')??$item->title }}">
                                                    @error('title')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="desc">Description</label>
                                                    {{-- <input type="text" class="form-control @error('desc') is-invalid @enderror" name="desc"
                                                        id="desc" value="{{ old('desc')??$item->desc }}"> --}}
                                                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">
                                                            {{ old('desc')??$item->desc }}
                                                        </textarea>
                                                    @error('desc')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="img">Image</label>
                                                    <input type="file" class="form-control-file @error('img') is-invalid @enderror" name="img"
                                                        id="img" value="{{ old('img')??$item->img }}">
                                                    @error('img')
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
