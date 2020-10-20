@section('sidenav')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
        <img src="{{asset('gambar/LogoPowers.png')}}" alt="Powers Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Powers</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
                <img src="{{ asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div> -->
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="far fa-user-circle p-2"></i>
                        <p>
                            About Us
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('abusdesc.index') }}" class="nav-link">
                                <i class="fas fa-book p-2"></i>
                                <p>Description</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('abusleader.index') }}" class="nav-link">
                                <i class="far fa-user-circle p-2"></i>
                                <p>Recent Leader</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('agenda.index') }}" method="GET" class="nav-link">
                        <i class="fas fa-calendar-week p-2"></i>
                        <p>
                            Agendas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('announcement.index') }}" method="GET" class="nav-link">
                        <i class="fas fa-bullhorn p-2"></i>
                        <p>
                            Announcements
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('discussion.index') }}" method="GET" class="nav-link">
                        <i class="fas fa-book p-2"></i>
                        <p>
                            Discussions
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gallery.index') }}" method="GET" class="nav-link">
                        <i class="fas fa-images p-2"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('material.index') }}" method="GET" class="nav-link">
                        <i class="fas fa-file  p-2"></i>
                        <p>
                            Materials
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('newranger.index') }}" method="GET" class="nav-link">
                        <i class="far fa-user-circle p-2"></i>
                        <p>New Rangers</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('portfolio.index') }}" method="GET" class="nav-link">
                        <i class="fas fa-file  p-2"></i>
                        <p>
                            Portfolios
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('testimonials.index') }}" class="nav-link">
                        <i class="far fa-user-circle p-2"></i>
                        <p>Testimonials</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@endsection