@extends('admin.frontend_dashboard.home')
@section('name','Venue Management')
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
    <a href="{{Route('venue.create')}}" class="btn btn-icon btn-lg btn-success"><i class="fas fa-check"></i></a>
    <br>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__("Venue Table")}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>

                                <th> <h6>#</h6> </th>
                                <th> <h6>Name</h6> </th>
                                <th><h6>Address</h6></th>
                                <th><h6>created at</h6></th>
                                <th><h6>Action</h6></th>
                            </tr>
                            @foreach($data as $result => $venue)
                                <tr>
                                    <td><h6>{{$result + $data->firstitem()}}</h6></td>
                                    <td><h6>{{$venue->name}}</h6></td>
                                    <td><h6>{{$venue->address}}</h6></td>
                                    <td><h6>{{$venue->created_at}}</h6></td>
                                    <td>
                                        <form action="{{Route('venue.destroy',$venue->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{Route('venue.edit',$venue->id)}}" class="btn btn-icon btn-primary "><i class="far fa-edit"></i></a>

                                            <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$data->links()}}
                    </div>
                </div>
@endsection
