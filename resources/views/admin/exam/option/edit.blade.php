@extends('admin.frontend_dashboard.home')
@section('name','Edit Option')
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
    <form action="{{Route('option.update',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group ">
            <label>Question</label>
            <select class="form-control select2bs4" name="question_id">
                <option value="" holder>select Question</option>
                @foreach($question as $questions)
                    <option value="{{$questions->id}}"
                            @if($questions->id==$data->question_id)
                            selected
                        @endif
                    >{{$questions->question_text}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Option text Name</label>
            <input type="text" class="form-control" name="option_text" value="{{$data->option_text}}">
        </div>
        <div class="form-group">
            <label>Points</label>
            <input type="text" class="form-control" name="points" value="{{$data->points}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Edit Option</button>
        </div>
    </form>
@endsection
