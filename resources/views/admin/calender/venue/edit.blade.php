@extends('frontend_dashboard.home')
@section('name','Edit Venue')
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
    <form action="{{Route('venue.update',$data->id)}}" method="POST" >
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Venue Name</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" value="{{$data->address}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Update Venue</button>
        </div>
    </form>
@endsection
