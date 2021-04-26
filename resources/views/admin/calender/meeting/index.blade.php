@extends('admin.frontend_dashboard.home')
@section('name','Meeting Management')
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
    <a href="{{Route('meeting.create')}}" class="btn btn-icon btn-lg btn-success"><i class="fas fa-check"></i></a>
    <br>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{__("Meeting Table")}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>

                                <th> <h6>#</h6> </th>
                                <th> <h6>attendees</h6> </th>
                                <th><h6>start_time</h6></th>
                                <th><h6>created at</h6></th>
                                <th><h6>Action</h6></th>
                            </tr>
                            @foreach($data as $result => $meetings)
                                <tr>
                                    <td><h6>{{$result + $data->firstitem()}}</h6></td>
                                    <td><h6>{{$meetings->attendees}}</h6></td>
                                    <td><h6>{{$meetings->start_time}}</h6></td>
                                    <td><h6>{{$meetings->created_at}}</h6></td>
                                    <td>
                                        <form action="{{Route('meeting.destroy',$meetings->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{Route('meeting.edit',$meetings->id)}}" class="btn btn-icon btn-primary "><i class="far fa-edit"></i></a>

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
