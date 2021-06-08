@extends('layouts.master')
@section('content')
    <div>
        <div class="wrapper ">
            <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
                <div class="logo"><a href="/" class="simple-text logo-normal">
                        Gestion de Stock
                    </a></div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/dashboard">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('admin/clients') ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/clients">
                                <i class="material-icons">person</i>
                                <p>Clients</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('admin/articles') ? 'active' : '' }}">
                            <a class="nav-link "  href="/admin/articles">
                                <i class="material-icons">content_paste</i>
                                <p>Articles</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('admin/commandes') ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/commandes">
                                <i class="material-icons">library_books</i>
                                <p>Commandes</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('admin/lignecommandes') ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/lignecommandes">
                                <i class="material-icons">bubble_chart</i>
                                <p>Ligne de Commandes</p>
                            </a>
                        </li>

                        <li class="nav-item active-pro a">
                            <a class="nav-link" href="/">
                                <i class="material-icons">unarchive</i>
                                <p>Upgrade to PRO</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand" href="/admin/dashboard">Dashboard</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                            <span class="navbar-toggler-icon icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end">
                            <form class="navbar-form">
                                <div class="input-group no-border">
                                    <input type="text" value="" class="form-control" placeholder="Search...">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </form>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">person</i>
                                        <p class="d-lg-none d-md-block">
                                            Account
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                        <a class="dropdown-item" href="/">Profile</a>
                                        <a class="dropdown-item" href="/">Settings</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/">Log out</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="content">
                    @yield('maindashboard')
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="float-left">
                            <ul>
                                <li>
                                    <a href="/">
                                        Bouhlali Abdelfattah
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="/">
                                        Licenses
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright float-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())

                            </script>, made with <i class="material-icons">favorite</i> by
                            <a href="https://github.com/DevLop99" target="_blank">DEVLOPER99</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');

                    $sidebar_img_container = $sidebar.find('.sidebar-background');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');

                    window_width = $(window).width();

                    $('.a').click((target) => {
                        $('.a').removeClass("active");
                        target.currentTarget.classList.add("active");
                    })

                    $('.switch-sidebar-mini input').change(function() {
                        $body = $('body');
                        $input = $(this);
                        if (md.misc.sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            md.misc.sidebar_mini_active = false;

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                        } else {

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                            setTimeout(function() {
                                $('body').addClass('sidebar-mini');

                                md.misc.sidebar_mini_active = true;
                            }, 300);
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);

                    });
                });
            });

        </script>
        <script>
            $(document).ready(function() {
                // Javascript method's body can be found in assets/js/demos.js
                md.initDashboardPageCharts();
            });

        </script>
    </div>
@endsection
