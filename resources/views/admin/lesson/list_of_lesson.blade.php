@extends('admin.frontend_dashboard.home')
@section('name','Lesson')
@section('section')
    <div class="row d-flex align-items-stretch">
        @foreach($topic as $data)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{$data->name}}</b></h2>
                                <p>{{$data->topic->name}}</p>
                                <p class="text-sm"><b>Description: </b> {{$data->description}}</p>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{asset($data->image)}}" alt=""  class="img-circle img-fluid" width="300" height="400">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="{{route('lesson.hh2',$data->slug)}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-sign-in-alt"></i> Enter Lesson
                            </a>
                        </div>
                    </div>
                </div>
            </div>


    @endforeach
@endsection


