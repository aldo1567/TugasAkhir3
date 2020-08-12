@extends('user.layouts.master')
@section('content')
<div class="welcome_clicnic_area"style="margin-top: 100px">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="welcome_thumb">
                    <div class="thumb_1">
                        @if (Auth::user()->gender=='M')
                            <img src="{{asset('img/user-man.png')}}" alt="User Man">
                        @else
                            <img src="{{asset('img/user-fe.png')}}" alt="User Female">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="welcome_docmed_info">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h1>Your Appointment</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Session Start</th>
                                            <th>Session End</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($id as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $item->session->workDay->date }}</td>
                                                <td>{{ date('g:i A',strtotime($item->session->session_start)) }}
                                                </td>
                                                <td>{{ date('g:i A',strtotime($item->session->session_end)) }}
                                                </td>
                                                @if ($item->status->status=="Complete")
                                                    <td class="text-center"><button class="btn btn-success">{{ $item->status->status }}</button></td>
                                                @elseif($item->status->status=="Cancel")
                                                    <td class="text-center"><button class="btn btn-danger">{{ $item->status->status }}</button></td>
                                                @else
                                                    <td class="text-center"><button class="btn btn-warning">{{ $item->status->status }}</button></td>
                                                    <td class="text-center"><a href="{{route('booking.cancel',$item->id)}}" class="btn btn-danger" onclick="cancel()">Cancel</a></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="test-form" class="white-popup-block mfp-hide table-responsive">
    <div class="popup_box ">
        <div class="popup_inner">
            <h3>
                Book an 
            <span>Appointment</span>
            </h3>
            <form action="{{route('booking.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-12">
                        <input type="text" value="{{Auth::user()->name??''}}" readonly>
                    </div>
                    <div class="col-xl-12">
                        <select name="session" id="session" class="form-control mb-3">
                            @foreach ($sessions as $session)
                                <option value="{{$session->id}}"{{(old('session'))==$session->id ? 'selected':''}}{{$session->capacity==0?'disabled':''}}>Date : {{$session->workDay->date}} | {{date('g:i A',strtotime($session->session_start))}}-{{date('g:i A',strtotime($session->session_end))}}</option>
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
<script>
    function cancel(){
        if(!confirm('Cancel This Appointment??')){
            event.preventDefault();
        }
    }
</script>
@endsection
