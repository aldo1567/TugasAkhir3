@extends('admin.layouts.master')
@section('section-title','Index Of Company Profile')
@section('section-breadcrumb','Company Profile')
@section('content')
<div class="card mb-4">
    <div class="card-header">

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Motto</th>
                        <th>Logo</th>
                        <th>Address</th>
                        <th>GMaps URL</th>
                        <th>Feature Section Title</th>
                        <th>Feature Section Description</th>
                        <th>Doctor Section Title</th>
                        <th>Doctor Section Description</th>
                        <th>Quality Section Title</th>
                        <th>Quality Section Description</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($company as $item)
                        <tr>

                            <td>{{ $item->name }}</td>
                            <td>{!! Illuminate\Support\Str::of($item->motto)->limit(20) !!}</td>
                            <td><img src="{{ Storage::url($item->logo) }}" alt="gambar"
                                    class="img-thumbnail bg-dark"></td>
                            <td>{!! Illuminate\Support\Str::of($item->address)->limit(20) !!}</td>
                            <td>{!! Illuminate\Support\Str::of($item->map_address)->limit(20) !!}</td>
                            <td>{!! Illuminate\Support\Str::of($item->feature_title)->limit(20) !!}</td>
                            <td>{!! Illuminate\Support\Str::of($item->feature_desc)->limit(20) !!}</td>
                            <td>{!! Illuminate\Support\Str::of($item->doctor_title)->limit(20) !!}</td>
                            <td>{!! Illuminate\Support\Str::of($item->doctor_desc)->limit(20) !!}</td>
                            <td>{!! Illuminate\Support\Str::of($item->quality_title)->limit(20) !!}</td>
                            <td>{!! Illuminate\Support\Str::of($item->quality_desc)->limit(20) !!}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#exampleModal{{ $loop->iteration }}">
                                    Edit
                                </button>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Company Profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('company.update',$item->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" id="name"
                                                        value="{{ old('name')??$item->name }}">
                                                    @error('name')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="motto">Motto</label>
                                                    {{-- <input type="text"
                                                        class="form-control @error('motto') is-invalid @enderror"
                                                        name="motto" id="motto"
                                                        value="{{ old('motto')??$item->motto }}">
                                                    --}}
                                                    <textarea name="motto" id="motto"
                                                        class="form-control @error('motto') is-invalid @enderror">
                                                            {{ old('motto')??$item->motto }}
                                                        </textarea>
                                                    @error('motto')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="logo">logo</label>
                                                    <input type="file"
                                                        class="form-control-file @error('logo') is-invalid @enderror"
                                                        name="logo" id="logo"
                                                        value="{{ old('logo')??$item->logo }}">
                                                    @error('logo')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    {{-- <input type="text"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        name="address" id="address"
                                                        value="{{ old('address')??$item->address }}">
                                                    --}}
                                                    <textarea name="address" id="address"
                                                        class="form-control @error('address') is-invalid @enderror">
                                                            {{ old('address')??$item->address }}
                                                        </textarea>
                                                    @error('address')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="map_address">Map Address</label>
                                                    <input type="text"
                                                        class="form-control @error('map_address') is-invalid @enderror"
                                                        name="map_address" id="map_address"
                                                        value="{{ old('map_address')??$item->map_address }}">
                                                    @error('map_address')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="feature_title">Feature Title</label>
                                                    {{-- <input type="text"
                                                        class="form-control @error('feature_title') is-invalid @enderror"
                                                        name="feature_title" id="feature_title"
                                                        value="{{ old('feature_title')??$item->feature_title }}">
                                                    --}}
                                                    <textarea name="feature_title" id="feature_title"
                                                        class="form-control @error('feature_title') is-invalid @enderror">
                                                            {{ old('feature_title')??$item->feature_title }}
                                                        </textarea>
                                                    @error('feature_title')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="feature_desc">Feature Description</label>
                                                    {{-- <input type="text"
                                                        class="form-control @error('feature_desc') is-invalid @enderror"
                                                        name="feature_desc" id="feature_desc"
                                                        value="{{ old('feature_desc')??$item->feature_desc }}">
                                                    --}}
                                                    <textarea name="feature_desc" id="feature_desc"
                                                        class="form-control @error('feature_desc') is-invalid @enderror">
                                                            {{ old('feature_desc')??$item->feature_desc }}
                                                        </textarea>
                                                    @error('feature_desc')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="doctor_title">Doctor Title</label>
                                                    {{-- <input type="text"
                                                        class="form-control @error('doctor_title') is-invalid @enderror"
                                                        name="doctor_title" id="doctor_title"
                                                        value="{{ old('doctor_title')??$item->doctor_title }}">
                                                    --}}
                                                    <textarea name="doctor_title" id="doctor_title"
                                                        class="form-control @error('doctor_title') is-invalid @enderror">
                                                            {{ old('doctor_title')??$item->doctor_title }}
                                                        </textarea>
                                                    @error('doctor_title')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="doctor_desc">Doctor Description</label>
                                                    {{-- <input type="text"
                                                        class="form-control @error('doctor_desc') is-invalid @enderror"
                                                        name="doctor_desc" id="doctor_desc"
                                                        value="{{ old('doctor_desc')??$item->doctor_desc }}">
                                                    --}}
                                                    <textarea name="doctor_desc" id="doctor_desc"
                                                        class="form-control @error('doctor_desc') is-invalid @enderror">
                                                            {{ old('doctor_desc')??$item->doctor_desc }}
                                                        </textarea>
                                                    @error('doctor_desc')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="quality_title">Quality Title</label>
                                                    {{-- <input type="text"
                                                        class="form-control @error('quality_title') is-invalid @enderror"
                                                        name="quality_title" id="quality_title"
                                                        value="{{ old('quality_title')??$item->quality_title }}">
                                                    --}}
                                                    <textarea name="quality_title" id="quality_title"
                                                        class="form-control @error('quality_title') is-invalid @enderror">
                                                            {{ old('quality_title')??$item->quality_title }}
                                                        </textarea>
                                                    @error('quality_title')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="quality_desc">Quality Description</label>
                                                    {{-- <input type="text"
                                                        class="form-control @error('quality_desc') is-invalid @enderror"
                                                        name="quality_desc" id="quality_desc"
                                                        value="{{ old('quality_desc')??$item->quality_desc }}">
                                                    --}}
                                                    <textarea name="quality_desc" id="quality_desc"
                                                        class="form-control @error('quality_desc') is-invalid @enderror">
                                                            {{ old('quality_desc')??$item->quality_desc }}
                                                        </textarea>
                                                    @error('quality_desc')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Company E-mail</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" id="email"
                                                        value="{{ old('email')??$item->email }}">
                                                    @error('email')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Company Phone Number</label>
                                                    <input type="number"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="phone" id="phone"
                                                        value="{{ old('phone')??$item->phone }}">
                                                    @error('phone')
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
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nostrum cum iste ducimus nulla voluptate exercitationem
rerum voluptatibus ab dolorem!
