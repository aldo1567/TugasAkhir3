@extends('user.layouts.master')
@section('content')
<section class="contact-section">
    <div class="container">
        <h1>{{ App\About::all()->first()->title }}</h1>
        <hr>
        <div class="row m-5">
            <div class="col-sm-12 col-md-6">
                <img src="{{ Storage::url(App\About::all()->first()->img) }}" alt="gambar"
                    class="img-fluid">
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="section_title" style="font-size: 14px;overflow-wrap: break-word;">
                    {!! App\About::all()->first()->desc !!}
                </div>
            </div>
        </div>

        <div class="d-sm-block mb-5 pb-4">
            <iframe src="{{ App\Company::all()->first()->map_address }}" allowfullscreen="" aria-hidden="false"
                tabindex="0" width="100%" height="500px">
            </iframe>
        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Get in Touch</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" action="{{ route('contact.store') }}"
                    method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100 @error('message') is-invalid @enderror"
                                    name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                @error('message')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid @error('name') is-invalid @enderror" name="name"
                                    id="name" type="text" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid @error('email') is-invalid @enderror" name="email"
                                    id="email" type="email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control @error('subject') is-invalid @enderror" name="subject"
                                    id="subject" type="text" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                @error('subject')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>{!! App\Company::all()->first()->address !!}</h3>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>{!! App\Company::all()->first()->phone !!}</h3>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>{{ App\Company::all()->first()->email }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                            @foreach(App\Session::all() as $session)
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

