@extends('admin.frontend_dashboard.home')
@section('name','Edit Question ')
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
    <form action="{{Route('question.update',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group ">
            <label>Category</label>
            <select class="form-control select2bs4" name="category_id">
                <option value="" holder>select Category</option>
                @foreach($category as $categories)
                    <option value="{{$categories->id}}"
                            @if($categories->id==$data->category_id)
                            selected
                        @endif
                    >{{$categories->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Question text Name</label>
            <input type="text" class="form-control" name="question_text" value="{{$data->question_text}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Edit Question</button>
        </div>
    </form>
@endsection
