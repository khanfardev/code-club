@extends('admin.frontend_dashboard.home')
@section('name','Event Edit')
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
    <form action="{{Route('event.update',$data->id)}}" method="POST" >
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Name event</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label>Start time</label>
            <input type="text" id="start_time" name="start_time" class="form-control datetimepicker" value="{{ $data->start_time }}">
        </div>
        <div class="form-group">
            <label>venue</label>
            <select class="form-control" name="venue_id">
                <option value="" holder>select venue</option>
                @foreach($venue as $venues)
                    <option value="{{$venues->id}}"
                    @if($venues->id ==$data->venue_id)
                        selected
                            @endif
                    >{{$venues->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block">Update Event</button>
        </div>
    </form>
@endsection
