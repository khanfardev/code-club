@extends('admin.frontend_dashboard.home')
@section('name','Edit Lesson')
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
    <div class="row mt-sm-4">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <form method="POST" action="{{Route('lesson.update',$data->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-header">
                        <h4>Edit Lesson</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <div class="form-group">
                                    <label>Lesson Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$data->name}}">
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" name="description">{{$data->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Body lesson</label>
                                <textarea class="textarea" name="body">{{$data->body}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-6">
                                <div class="form-group">
                                    <label>topic</label>
                                    <select class="form-control" name="topic_id">
                                        <option value="" holder>select topic</option>
                                        @foreach($topic as $topics)
                                            <option value="{{$topics->id}}"

                                            @if($topics->id == $data->topic_id)
                                                    selected
                                                @endif>{{$topics->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-6">
                                <div class="form-group">
                                    <label>level</label>
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
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
