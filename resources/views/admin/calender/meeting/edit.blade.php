@extends('admin.frontend_dashboard.home')
@section('name','Edit Meeting')
@section('section')
    @if(count($errors)>0)
        @foreach($errors->all() as $err)
            <div class="alert alert-danger" role="alert">
                {{ $err }}
            </div>
        @endforeach
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
        </div>

    @endif
    <form action="{{Route('meeting.update',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Attendees</label>
            <input type="text" class="form-control" name="attendees" value="{{$data->attendees}}">
        </div>
        <div class="form-group">
            <label>start time</label>
            <input type="text" id="start_time" name="start_time" class="form-control datetimepicker" value="{{$data->start_time}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Edit Meeting</button>
        </div>
    </form>
@endsection

