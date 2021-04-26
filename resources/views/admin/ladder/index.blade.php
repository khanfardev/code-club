@extends('admin.frontend_dashboard.home')
@section('name','Ladder Management')
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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Level</th>
                                <th>User Publish></th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($data as $result => $ladder)
                                <tr>
                                    <td><h6>{{$result + $data->firstitem()}}</h6></td>
                                    <td><h6>{{$ladder->name}}</h6></td>
                                    <td><h6>{{$ladder->description}}</h6></td>
                                    <td><h6>{{$ladder->level->name}}</h6></td>
                                    <td><h6>{{$ladder->users->first_name.' '.$ladder->users->last_name}}</h6></td>

                                    <td><h6>{{$ladder->created_at}}</h6></td>
                                    <td>
                                        <form action="{{Route('ladder.destroy',$ladder->id)}}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <a href="{{Route('ladder.show',$ladder->id)}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info-circle"></i>Add Problem</a>
                                            <a href="{{Route('problem.index',$ladder->id)}}" class="btn btn-icon icon-left btn-light"><i class="fas fa-star"></i>Problem List</a>

                                            <a href="{{Route('ladder.edit',$ladder->id)}}" class="btn btn-icon icon-left btn-info "><i class="far fa-edit"></i></a>

                                            <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Level</th>
                                <th>User Publish</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{$data->links()}}
                    </div>
                </div>
@endsection
