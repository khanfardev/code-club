@extends('admin.frontend_dashboard.home')
@section('name','Edit Question Category')
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
    <form action="{{Route('category.update',$data->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Create Category</button>
        </div>
    </form>
@endsection
