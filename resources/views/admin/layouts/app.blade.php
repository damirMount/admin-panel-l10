<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Админка') }}</title>
    <!-- CSS only -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
    <style>
        #wrapper {
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #sidebar-wrapper {
            z-index: 1000;
            position: fixed;
            left: 200px;
            width: 0;
            height: 100%;
            margin-left: -200px;
            overflow-y: auto;
            background: #2e363b;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 200px;
        }

        #page-content-wrapper {
            width: 100%;
            position: absolute;
            padding: 15px;
        }

        #wrapper.toggled #page-content-wrapper {
            position: absolute;
            margin-right: -200px;
        }

        /* Sidebar Styles */

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 200px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            text-indent: 20px;
            line-height: 40px;
        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: #999999;
        }

        .sidebar-nav li a:hover {
            /*text-decoration: none;*/
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar-nav li a:active,
        .sidebar-nav li a:focus {
            text-decoration: none;

        }

        .sidebar-nav li a.active {
            color: #007bff;
        }

        .sidebar-nav > .sidebar-brand {
            height: 65px;
            font-size: 18px;
            line-height: 60px;
        }

        .sidebar-nav > .sidebar-brand a {
            color: #999999;
        }

        .sidebar-nav > .sidebar-brand a:hover {
            color: #fff;
            background: none;
        }

        @media (min-width: 768px) {
            #wrapper {
                padding-left: 200px;
            }

            #wrapper.toggled {
                padding-left: 0;
            }

            #sidebar-wrapper {
                width: 200px;
            }

            #wrapper.toggled #sidebar-wrapper {
                width: 0;
            }

            #page-content-wrapper {
                padding: 20px;
                position: relative;
            }

            #wrapper.toggled #page-content-wrapper {
                position: relative;
                margin-right: 0;
            }
        }

        #admin-header {
            background-color: #1b1e21;
            z-index: 999;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%
        }

        /* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
        .sticky + .after-header {
            padding-top: 64px;
        }

        .mainmenu li:hover .submenu {
            display: block;
            max-height: 200px;
        }

        /* this is the initial state of all submenus.
          we set it to max-height: 0, and hide the overflowed content.
        */
        .submenu {
            overflow: hidden;
            max-height: 0;
            -webkit-transition: all 0.5s ease-out;
        }

        .submenu li {
            list-style-type: none;
            text-indent: 10px;
        }

        #snoAlertBox {
            position: absolute;
            z-index: 1400;
            top: 2%;
            right: 4%;
            margin: 0px auto;
            text-align: center;
            display: none;
        }
    </style>
</head>
<body>
<nav id="admin-header" class="navbar navbar-expand-lg">
    <ul class="navbar-nav mr-auto">
        <button id="menu-toggle" class="btn btn-link font">
            <i class="fas fa-bars fa-2x"></i>
        </button>
    </ul>
</nav>
<div class="d-flex after-header">
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav mainmenu">
                <li class="sidebar-brand">
                    <a href="{{ route('admin_articles.index') }}">Главное</a>
                </li>
                <li>
                    <a href="{{ route('admin_articles.index') }}"
                       class="{{ request()->is('admin/article*') ? 'active' : '' }}">Новости</a>
                </li>
                <li>
                    <a href="{{ route('admin_businesses.index') }}"
                       class="{{ request()->is('admin/business*') ? 'active' : '' }}">Бизнесы</a>
                </li>
                <li>
                    <a href="{{ route('admin_families.index') }}"
                       class="{{ request()->is('admin/famil*') ? 'active' : '' }}">Семьи</a>
                </li>
                <li>
                    <a href="{{ route('admin_items.index') }}"
                       class="{{ request()->is('admin/item*') ? 'active' : '' }}">Предметы</a>
                </li>
                <li>
                    <a href="{{ route('admin_persons.index') }}"
                       class="{{ request()->is('admin/person*') ? 'active' : '' }}">Персоны</a>
                </li>
                <li>
                    <a href="{{ route('admin_departments.index') }}"
                       class="{{ request()->is('admin/department*') ? 'active' : '' }}">Департамент</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="page-content-wrapper" class="container-fluid">
        @yield('content')
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>

<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    // When the user scrolls the page, execute myFunction
    window.onscroll = function () {
        myFunction()
    };

    // Get the header
    const header = document.getElementById("admin-header");

    // Get the offset position of the navbar
    const sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if(window.pageYOffset===0){
            return;
        }
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
@stack('scripts')
</body>
</html>
