@extends('auth.auth_new.forntend_auth.app')
@section('section')
    <title>Register</title>

    <body class="hold-transition login-page">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-logo">
                            <a href="{{ route('login') }}"><b>Code Club</b>Yu</a>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header"><h4>Register</h4></div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ __('ID-Student')}}</label>
                                        <input id="stu_id" type="text" class="form-control @error('stu_id') is-invalid @enderror" name="stu_id" value="{{ old('stu_id') }}" required autocomplete="stu_id" autofocus>
                                        @error('stu_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="first_name">{{ __('First Name') }}</label>
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">{{ __('Last Name')}}</label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                        </div>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __('Email')}}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">{{ __('Password')}}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" required autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-divider">
                                            {{__('Additional information')}}
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>  {{__('University')}}</label>
                                            <select class="form-control selectric" name="university">
                                                <option value="Yarmouk">Yarmouk</option>
                                                <option value="jordan university of science and technology">jordan university of science and technology</option>
                                                <option value="jordan university">jordan university</option>
                                                <option value="hashemite university">hashemite university</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>{{__("Faculty")}}</label>
                                            <select class="form-control selectric" name="faculty">
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Computer information systems">Computer information systems</option>
                                                <option value="Cyber security">Cyber security</option>
                                                <option value="Computer Engineering">Computer Engineering</option>
                                                <option value="Network engineering and information security">Network engineering and information security</option>
                                                <option value="Business Information Technology">Business Information Technology</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            {{ __('Register') }}

                                        </button>
                                    </div>
                                </form>
                                <div class="social-auth-links text-center mb-3">
                                    <p>- OR -</p>
                                    <a href="{{Route('login')}}" class="btn btn-block btn-success">
                                        login
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </body>

@endsection
