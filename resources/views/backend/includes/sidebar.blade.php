<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('uploads/'.auth()->user()->image) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ aurl('/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ aurl('/users/create') }}"><i class="fa fa-plus"></i>Create Users</a></li>
                    <li><a href="{{ aurl('/users') }}"><i class="fa fa-list"></i>Show All Users</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ aurl('/cats/create') }}"><i class="fa fa-plus"></i>Create Categories</a></li>
                    <li><a href="{{ aurl('/cats') }}"><i class="fa fa-list"></i>Show All Categories</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Tags</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ aurl('/tags/create') }}"><i class="fa fa-plus"></i>Create Tags</a></li>
                    <li><a href="{{ aurl('/tags') }}"><i class="fa fa-list"></i>Show All Tags</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Posts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ aurl('/posts/create') }}"><i class="fa fa-plus"></i>Create Posts</a></li>
                    <li><a href="{{ aurl('/posts') }}"><i class="fa fa-list"></i>Show All Posts</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
