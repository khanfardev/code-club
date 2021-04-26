@extends('admin.frontend_dashboard.home')
@section('title','Dashboard ACM')
@section('name','Dashboard ACM')
@section('section')

    <div class="row">
        @if(empty(Auth()->user()->handel))
            <div class="col-12 mb-4">

    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i>Welcome, {{Auth()->user()->first_name}}! you did not enter your handel on the Code Forces website, enter it
        </h5>
        
        <a href="{{Route('handle.index',Auth()->id())}}" class="btn btn-primary btn"><i class="far fa-user"></i> Enter Handel</a>

    </div>


    @elseif(!is_null($handelData))
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h5>Handel Name</h5>

                                <p>{{$handelData->result[0]->handle}}</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-user"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h5>Ratting<sup style="font-size: 20px"></sup></h5>

                                <p>
                                    @if(empty($handelData->result[0]->rating))
                                        Undefined
                                    @else
                                        {{$handelData->result[0]->rating}}
                                    @endif
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <h5>Rank</h5>

                                <p> @if(empty($handelData->result[0]->rank))
                                        Undefined
                                    @else
                                        {{$handelData->result[0]->rank}}
                                    @endif</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-file"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h5>Number Problem Solve</h5    >

                                <p>{{$countProblemSolve}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
    @else

        <div class="card-body">
            <div class="alert alert-danger alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">codeforces</div>
                    The site no longer works. Please try again later
                </div>
            </div>
    @endif
@endsection
