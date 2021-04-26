@extends('admin.frontend_dashboard.home')
@section('name','Question Management')
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
                                <th>Category</th>
                                <th>Question Text</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($data as $result => $question)

                                <tr>
                                    <td>{{$result + $data->firstitem()}}</td>
                                    <td>{{$question->category->name}}</td>
                                    <td>{{$question->question_text}}</td>
                                    <td>{{$question->created_at}}</td>
                                    <td>
                                        <form action="{{Route('question.destroy',$question->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{Route('question.edit',$question->id)}}" class="btn btn-icon btn-primary "><i class="far fa-edit"></i></a>

                                            <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Question Text</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{$data->links()}}
                    </div>
            </div>
@endsection
