@extends('admin.frontend_dashboard.home')
@section('title','Problem ladder')
@section('name','Problem')
@section('section')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
        </div>

    @endif
    @if(Session::has('delete'))
        <div class="alert alert-danger" role="alert">
            {{ Session('delete') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">

                <section class="content">


                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Index</th>
                                <th>Problem Name</th>
                                <th>Action</th>
                                <th>Sol</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $result => $problems)
                                <?php $flagAccepted=2 ?>

                               @if($dataProblem->status!="FAILED")
                                @foreach ($dataProblem->result as $key => $value)
                                    @if($value->problem->name==$problems->name)
                                        @if($value->verdict=="OK")
                                            <?php $flagAccepted=1 ?>
                                            @break
                                            @elseif($value->verdict=="WRONG_ANSWER")
                                            <?php
                                            $flagAccepted=0;
                                            ?>
                                            @else
                                            <?php $flagAccepted=2 ?>
                                        @endif
                                        @endif
                                    @endforeach
                                @endif
                                <tr>
                                    <td><h6>{{$result + $data->firstitem()}}</h6></td>
                                    <td><h6>{{$problems->index}}</h6></td>
                                <td><a href="{{$problems->url}}" target="_blank"><h6>{{$problems->name}}</h6></a></td>

                                <td>
                                    <form action="{{Route('problem.delete',$problems->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                    </form>
                                </td>
                                    <th bgcolor="
                                    @if($flagAccepted==2)
                                        #6495ed
                                       @elseif($flagAccepted==1)
                                        green
                                        @elseif($flagAccepted==0)
                                        red
                                        @endif
                                        "><h6 style="color:white;" align="center" >
                                            @if($flagAccepted==2)
                                                Not resolved
                                            @elseif($flagAccepted==1)
                                                Accepted
                                            @elseif($flagAccepted==0)
                                                Wrong Answer
                                            @endif
                                        </h6>
                                    </th>
                               </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data->links()}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
    @endsection
