@extends('admin.frontend_dashboard.home')
@section('name','Create Topic')
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
    <form action="{{Route('topic.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Topic Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description" value="{{old('description')}}">
        </div>

        <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="level_id">
                <option value="" holder>select level</option>
                @foreach($level as $levels)
                    <option value="{{$levels->id}}">{{$levels->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
                <button class="btn btn-primary btn-block">Create Topic</button>
        </div>
    </form>
@endsection
