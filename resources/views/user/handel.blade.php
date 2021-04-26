@extends('admin.frontend_dashboard.home')
@section('name','Handel')
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
    <form action="{{Route('handel.update')}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Handel Name</label>
            <input type="text" class="form-control" name="handel"
                   @if(!empty(Auth()->user()->handel))
                   value="{{Auth()->user()->handel}}"
                   readonly
                   @endif
            >
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block"
            @if(!empty(Auth()->user()->handel))
            disabled
                    @endif
            >Ok</button>
        </div>
    </form>
@endsection
