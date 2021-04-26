@extends('admin.frontend_dashboard.home')
@section('name','Add Problem')
@section('section')
    @if(count($errors)>0)
        @foreach($errors->all() as $err)
            <div class="alert alert-danger" role="alert">
                {{ $err }}
            </div>
        @endforeach
    @endif

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
    @if(!is_null($dataProblemAPI))
        <form method="POST" action="{{Route('problem.create',$data->id)}}">
            @csrf
                <select class="form-control select2bs4" style="width: 100%;" name="testing">
                @foreach ($dataProblemAPI->result->problems as $key => $value)
            <option value='[{"index":"{{$value->index}}","name":"{{$value->name}}","href":"https://codeforces.com/problemset/problem/{{$value->contestId}}/{{$value->index}}","contestId":"{{$value->contestId}}"}]'>{{ $value->index.':='.$value->name}}</option>
            @endforeach

        </select>
<br>
            <button class="btn btn-block btn-primary btn-lg">Add Problem</button>
        </form>

    <script type="text/javascript">
        $(".chosen").chosen();
    </script>
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

