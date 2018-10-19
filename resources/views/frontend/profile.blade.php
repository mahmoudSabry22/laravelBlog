@extends('frontend.layout.app')

@section('content')

	<div class="main-container">
            <section class="cover height-100 imagebg" data-overlay="4">
                <div class="background-image-holder">
                    <img alt="background" src="{{asset('frontend/img/inner-1.jpg')}}" />
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-8 col-lg-5">
                            <h1>
                                {{auth()->user()->name}}
                            </h1>

                            <p class="lead">
                            	Your Email Is <em>{{auth()->user()->email}}</em> ,And you are <em>{{auth()->user()->type}}</em> User , You Join At Our Blog In <em>{{auth()->user()->created_at}}</em>
                            </p>
                            <a class="btn btn--primary type--uppercase" href="{{url('/')}}">
                                <span class="btn__text">
                                    Go to Home
                                </span>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
 
        </div>

@endsection