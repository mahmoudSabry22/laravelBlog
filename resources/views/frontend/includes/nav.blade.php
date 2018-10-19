<!--end of notification-->
@if(auth()->check())
<div class="nav-container ">
    
        
    <!--end bar-->
    <nav id="menu1" class="bar bar--sm bar-1 hidden-xs ">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-2 hidden-xs">
                    <div class="bar__module">
                        <a href="{{url('/')}}">
                            <img class="logo logo-dark" alt="logo" src="{{ asset('frontend/img/logo-dark.png') }}" />
                            <img class="logo logo-light" alt="logo" src="{{ asset('frontend/img/logo-light.png') }}" />
                        </a>
                    </div>
                    <!--end module-->
                </div>
               
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </nav>
    <!--end bar-->
</div>
@endif