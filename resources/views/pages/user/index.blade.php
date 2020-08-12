@extends('user.layouts.master')
@section('content')
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <span>Clinic {!! App\Company::all()->first()->name !!}</span>
                            <h3 class="text-white">{!! App\Company::all()->first()->motto !!}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- welcome_clicnic_area_start -->
<div class="container">
    <div class="welcome_clicnic_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="{{ asset('user/img/about/1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info"style="overflow-wrap: break-word;">
                        <h3>{!! App\Company::all()->first()->feature_title !!}</h3>
                        <p >{!! App\Company::all()->first()->feature_desc !!}</p>
                        <ul>
                            @foreach(App\Feature::all() as $feature)
                                <li> <i class="flaticon-verified"></i> {!! $feature->feature !!} </li>
                            @endforeach
                        </ul>
                        <a href="{{route('contact.index')}}" class="boxed-btn6">About us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_clicnic_area_end -->
    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-6">
                    <div class="section_title text-center"style="overflow-wrap: break-word;">
                        <h3>{!! App\Company::all()->first()->doctor_title !!}</h3>
                        <p >{!! App\Company::all()->first()->doctor_desc !!}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach(App\Doctors::all() as $doctors)
                    <div class="col-lg-4 col-md-6">
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{ Storage::url($doctors->img) }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>{{ $doctors->name }}</h3>
                                <span>{{ $doctors->specialist }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->
    <!-- quality_area_start  -->
    <div class="quality_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-6">
                    <div class="section_title text-center" style="overflow-wrap: break-word;">
                        <h3>{!! App\Company::all()->first()->quality_title !!}</h3>
                        <p style="overflow-wrap: break-word;">{!! App\Company::all()->first()->quality_desc !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach(App\Quality::all() as $quality)
                    <div class="col-lg-4 col-md-6">
                        <div class="single_quality"style="overflow-wrap: break-word;">
                            <div class="icon">
                                <i class="{!!$quality->icon!!} mx-auto"></i>
                            </div>
                            <h3>{!! $quality->title !!}</h3>
                            <p>{!! $quality->desc !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- quality_areaend  -->
    @auth
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="book_room" align="center">
                    <div class="book_btn">
                        <a class="popup-with-form btn btn-block btn-secondary w-75 text-center" href="#test-form">Book
                            Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</div>
@endsection
<div id="test-form" class="white-popup-block mfp-hide table-responsive">
    <div class="popup_box ">
        <div class="popup_inner">
            <h3>
                Book an
                <span>Appointment</span>
            </h3>
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-12">
                        <input type="text" value="{{ Auth::user()->name??'' }}" readonly>
                    </div>
                    <div class="col-xl-12">
                        <select name="session" id="session" class="form-control mb-3">
                            <option selected disabled>--Select--</option>
                            @foreach($sessions as $session)
                                <option value="{{ $session->id }}"
                                    {{ (old('session'))==$session->id ? 'selected':'' }}{{ $session->capacity==0?'disabled':'' }}>
                                    Date : {{ $session->workDay->date }} |
                                    {{ date('g:i A',strtotime($session->session_start)) }}-{{ date('g:i A',strtotime($session->session_end)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="boxed-btn3">Make an Appointment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
