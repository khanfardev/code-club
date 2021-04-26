@extends('admin.frontend_dashboard.home')
@section('name','edit Ladder')
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
    <form action="{{Route('ladder.update',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Ladder Name</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description" value="{{$data->description}}">
        </div>
        <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="level_id">
                <option value="" holder>select level</option>
                @foreach($level as $levels)
                    <option value="{{$levels->id}}"
                            @if($levels->id==$data->level_id)
                            selected
                        @endif
                    >{{$levels->name}}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Edit ladder</button>
        </div>
    </form>
@endsection
