@extends('admin.frontend_dashboard.home')
@section('name','User Management')
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
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>University</th>
                                <th>Collage</th>
                                <th>Role</th>
                                <th>Action</th>




                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $result => $user)

                                <tr>
                                    <td>{{$result + $data->firstitem()}}</td>
                                    <td>{{$user->first_name.' '.$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->university}}</td>
                                    <td>{{$user->collage}}</td>
                                    @if($user->role=='1')
                                    <td><h6>Admin</h6></td>
                                    @else
                                        <td><h6>User</h6></td>
                                @endif
                                 <td>
                                    <form action="{{Route('user.destroy',$user->id)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                            <a href="{{Route('user.edit',$user->id)}}" class="btn btn-icon icon-left btn-info "><i class="far fa-edit"></i></a>

                                        <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                    </form>
                                </td>
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
