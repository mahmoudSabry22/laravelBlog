@if(auth()->check())
<section class="bar bar-3 bar--sm bg--secondary">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="bar__module">
                    <span class="type--fade">Blog Name | What is your blog doing !?</span>
                </div>
            </div>

            

            <div class="col-lg-6 text-right text-left-xs text-left-sm">
                <div class="bar__module">
                    <ul class="menu-horizontal">
                        <li>
                            <a href="#" data-notification-link="side-menu">
                            <h5>  Setting</h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<!--end bar-->
@endif
@include('frontend.includes.modals')
