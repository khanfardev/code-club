@extends('admin.frontend_dashboard.home')
@section('name','Topic')
@section('section')
            @foreach($topic as $data)
                <div >
        <div >
            <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead"><b>{{$data->name}}</b></h2>
                            <p> <i class="fas fa-level-up-alt"></i>{{$data->level->name}}</p>

                            <p ><b>Description: </b> {{$data->description}} </p>
                        </div>
                        <div class="col-5 text-center">
                            <img src="{{asset($data->image)}}" width="300" height="400" alt="" class="img-circle img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">

                        <a href="{{route('lesson.hh',$data->slug)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Enter Topic
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endforeach
@endsection
