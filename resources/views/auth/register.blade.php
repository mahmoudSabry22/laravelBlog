@extends('frontend.layout.app')

@section('content')
    <section class="height-100 imagebg text-center" data-overlay="4">
                <div class="background-image-holder">
                    <img alt="background" src="{{asset('frontend/img/inner-7.jpg')}}" />
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-7 col-lg-5">
                            <h2>Register New Account</h2>
                            <p class="lead">
                                Welcome back, sign in with your existing Stack account credentials
                            </p>
                           <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class=" row">
                            

                                    <div class="col-md-12">
                                        <input id="name" type="text" placeholder="Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                

                                    <div class="col-md-12">
                                        <input id="password-confirm" placeholder="Password Confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                
                                    <div class="col-md-12">
                                        <button class="btn btn--primary type--uppercase" type="submit">Register</button>
                                    </div>
                                </div>
                           </form>
                            
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
@endsection
