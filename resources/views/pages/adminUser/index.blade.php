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
                        <li class="nav-item active  ">
                            <a class="nav-link" href="/dashboardA">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/dashboardA">
                                <i class="material-icons">person</i>
                                <p>Clients</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/dashboardA">
                                <i class="material-icons">content_paste</i>
                                <p>Articles</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/dashboardA">
                                <i class="material-icons">library_books</i>
                                <p>Commandes</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="">
                                <i class="material-icons">bubble_chart</i>
                                <p>Ligne de Commandes</p>
                            </a>
                        </li>

                        <li class="nav-item active-pro ">
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
                            <a class="navbar-brand" href="javascript:;">Dashboard</a>
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
                            <a href="/" target="_blank">Creative Tim</a> for a better web.
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
    
                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
    
                    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                            $('.fixed-plugin .dropdown').addClass('open');
                        }
    
                    }
    
                    $('.fixed-plugin a').click(function(event) {
                        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });
    
                    $('.fixed-plugin .active-color span').click(function() {
                        $full_page_background = $('.full-page-background');
    
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');
    
                        var new_color = $(this).data('color');
    
                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-color', new_color);
                        }
    
                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }
    
                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data-color', new_color);
                        }
                    });
    
                    $('.fixed-plugin .background-color .badge').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');
    
                        var new_color = $(this).data('background-color');
    
                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-background-color', new_color);
                        }
                    });
    
                    $('.fixed-plugin .img-holder').click(function() {
                        $full_page_background = $('.full-page-background');
    
                        $(this).parent('li').siblings().removeClass('active');
                        $(this).parent('li').addClass('active');
    
    
                        var new_image = $(this).find("img").attr('src');
    
                        if ($sidebar_img_container.length != 0 && $(
                                '.switch-sidebar-image input:checked').length != 0) {
                            $sidebar_img_container.fadeOut('fast', function() {
                                $sidebar_img_container.css('background-image', 'url("' +
                                    new_image + '")');
                                $sidebar_img_container.fadeIn('fast');
                            });
                        }
    
                        if ($full_page_background.length != 0 && $(
                                '.switch-sidebar-image input:checked').length != 0) {
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                                'img').data('src');
    
                            $full_page_background.fadeOut('fast', function() {
                                $full_page_background.css('background-image', 'url("' +
                                    new_image_full_page + '")');
                                $full_page_background.fadeIn('fast');
                            });
                        }
    
                        if ($('.switch-sidebar-image input:checked').length == 0) {
                            var new_image = $('.fixed-plugin li.active .img-holder').find("img")
                                .attr('src');
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                                'img').data('src');
    
                            $sidebar_img_container.css('background-image', 'url("' + new_image +
                                '")');
                            $full_page_background.css('background-image', 'url("' +
                                new_image_full_page + '")');
                        }
    
                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                        }
                    });
    
                    $('.switch-sidebar-image input').change(function() {
                        $full_page_background = $('.full-page-background');
    
                        $input = $(this);
    
                        if ($input.is(':checked')) {
                            if ($sidebar_img_container.length != 0) {
                                $sidebar_img_container.fadeIn('fast');
                                $sidebar.attr('data-image', '#');
                            }
    
                            if ($full_page_background.length != 0) {
                                $full_page_background.fadeIn('fast');
                                $full_page.attr('data-image', '#');
                            }
    
                            background_image = true;
                        } else {
                            if ($sidebar_img_container.length != 0) {
                                $sidebar.removeAttr('data-image');
                                $sidebar_img_container.fadeOut('fast');
                            }
    
                            if ($full_page_background.length != 0) {
                                $full_page.removeAttr('data-image', '#');
                                $full_page_background.fadeOut('fast');
                            }
    
                            background_image = false;
                        }
                    });
    
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
