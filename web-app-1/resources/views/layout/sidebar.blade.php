<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('AdminLTE-3.1.0/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE-3.1.0/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block"> {{ Auth::user()->name }}</a>
            </div>

        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @yield('hr.sidebar')
                @yield('employee.sidebar')
                @yield('trainee.sidebar')

<!--
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-sticky-note"></i>
                            <p>
                                Blogs
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>

-->
            </ul>
        </nav>
    </div>
</aside>
<style>
    .sidebar{

height: 100%;
    }
</style>
