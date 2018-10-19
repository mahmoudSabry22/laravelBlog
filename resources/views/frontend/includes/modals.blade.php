<div class="notification pos-right pos-top side-menu bg--white" data-notification-link="side-menu" data-animation="from-right">
@if(auth()->check())
<div class="side-menu__module">
                <img alt="Image" style="height: 215px;width: 290px" src="{{asset('uploads/'.auth()->user()->image)}}" />
                <h6 class="type--uppercase text-center" style="color: green">Welcome {{auth()->user()->name}}</h6>
            </div>
    
<hr>
    <div class="side-menu__module">
        <ul class="list--loose list--hover">
            @if(auth()->user()->type === 'admin')
            <li>
                <a href="{{url('/admin')}}">
                    <span class="h5">Dashboard</span>
                </a>
            </li>            
            @endif
            <li>
                <a href="{{route('profile',auth()->user()->name)}}">
                    <span class="h5">Your Profile</span>
                </a>
            </li>

            <li>
                <a href="{{route('posts.user',auth()->user()->id)}}">
                    <span class="h5">Your Posts</span>
                </a>
            </li>
           


            <li>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            
        </ul>
    </div>
    <!--end module-->
@endif

</div>


