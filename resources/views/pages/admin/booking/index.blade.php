@extends('admin.layouts.master')
@section('section-title','Index Of Booking')
@section('section-breadcrumb','Booking')
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
                        <th>Name</th>
                        <th>Date</th>
                        <th>Session Start</th>
                        <th>Session End</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->session->workDay->date }}</td>
                            <td>{{ date('g:i A',strtotime($item->session->session_start)) }}
                            </td>
                            <td>{{ date('g:i A',strtotime($item->session->session_end)) }}
                            </td>
                            <td>{{ $item->status->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('complete',$item->id) }}"
                                    class="btn btn-success">Complete</a>
                                <a href="{{ route('cancel',$item->id) }}"
                                    class="btn btn-danger">Cancel</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#edit_book_session{{$loop->iteration}}">
                                    Edit Session
                                </button>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="edit_book_session{{$loop->iteration}}" tabindex="-1" role="dialog"
                                aria-labelledby="edit_session_label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit_session_label">Change Session</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.booking.update',$item->id)}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <select name="session" id="session" class="form-control mb-3">
                                                    @foreach ($sessions as $session)
                                                        <option value="{{$session->id}}" {{(old('session')??$session->id)==$item->session_id ? 'selected':''}}{{$session->capacity==0?'disabled':''}}>Date : {{$session->workDay->date}} | {{date('g:i A',strtotime($session->session_start))}}-{{date('g:i A',strtotime($session->session_end))}}</option>
                                                    @endforeach
                                                </select>
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

