@extends('admin.frontend_dashboard.home')
@section('name','Edit Level')
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
    <form action="{{Route('level.update',$data->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Level Name</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Create Level</button>
        </div>
    </form>
@endsection
