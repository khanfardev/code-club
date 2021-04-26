@extends('admin.frontend_dashboard.home')
@section('name','Lesson Management')
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
                                                <th>description</th>
                                                <th>User Publish</th>
                                                <th>Topic</th>
                                                <th>Level</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            @foreach($data as $result => $lesson)

                                                <tr>
                                                    <td>{{$result + $data->firstitem()}}</td>

                                                    <td>{{$lesson->name}}</td>
                                                    <td>{{$lesson->description}}</td>
                                                    <td>{{$lesson->users->first_name .' '. $lesson->users->last_name}}</td>
                                                    <td>{{$lesson->topic->name}}</td>
                                                    <td>{{$lesson->level->name}}</td>
                                                    <td>{{$lesson->created_at}}</td>
                                                    <td>
                                                        <form action="{{Route('lesson.destroy',$lesson->id)}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{Route('lesson.edit',$lesson->id)}}" class="btn btn-icon btn-primary "><i class="far fa-edit"></i></a>
                                                            <a href="{{Route('lesson.show',$lesson->id)}}" class="btn btn-icon btn-info "><i class="fas fa-info-circle"></i></a>

                                                            <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                                <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>description</th>
                                                <th>User Publish</th>
                                                <th>Topic</th>
                                                <th>Level</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>



@endsection
