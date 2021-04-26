@extends('admin.frontend_dashboard.home')
@section('name','Event Management')
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
    <a href="{{Route('event.create')}}" class="btn btn-icon btn-lg btn-success"><i class="fas fa-check"></i></a>
    <br>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__("Event Table")}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>

                                <th> <h6>#</h6> </th>
                                <th> <h6>Name</h6> </th>
                                <th><h6>venue</h6></th>
                                <th><h6>start_time</h6></th>
                                <th><h6>created at</h6></th>
                                <th><h6>Action</h6></th>
                            </tr>
                            @foreach($data as $result => $event)
                                <tr>
                                    <td><h6>{{$result + $data->firstitem()}}</h6></td>
                                    <td><h6>{{$event->name}}</h6></td>
                                    <td><h6>{{$event->venue->name}}</h6></td>
                                    <td><h6>{{$event->start_time}}</h6></td>
                                    <td><h6>{{$event->created_at}}</h6></td>
                                    <td>
                                        <form action="{{Route('event.destroy',$event->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{Route('event.edit',$event->id)}}" class="btn btn-icon btn-primary "><i class="far fa-edit"></i></a>

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
