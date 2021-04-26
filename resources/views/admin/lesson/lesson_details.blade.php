@extends('admin.frontend_dashboard.home')

@section('section')
    <!-- Main content -->

    <section class="content">
@foreach($data as $lesson)
    @section('name',$lesson->name)
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"></h3>
                        <div class="col-12">
                            {!! $lesson->body !!}                       </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{$lesson->name}}</h3>

                        <hr>
                        <p><i class="fas fa-users"></i><b>User Publish</b> : {{$lesson->users->first_name.' '.$lesson->users->last_name}} </p>
                        <hr>
                        <h6><i class="fas fa-level-up-alt"></i>{{$lesson->level->name}}</h6>


                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                Description
                            </h2>
                            <h4 class="mt-0">
                                <small>{{$lesson->description}}</small>
                            </h4>
                        </div>

                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-copy"></i>
                                Questions about the lesson
                            </div>


                        </div>


                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @endforeach
@endsection
