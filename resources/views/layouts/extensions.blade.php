<!--

=========================================================
* Now UI Dashboard PRO - v1.4.1
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard-pro
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/cfc-logo.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/cfc-logo.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    CBT
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.4.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <script src="simple.money.format.js"></script>

  

</head>

<body class=" sidebar-mini ">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="home" class="simple-text logo-mini">
          <img src="{{ asset('assets/img/cfc-logo.png') }}" alt="">
        </a>
        <a href="home" class="simple-text logo-normal">
          <strong>AML/CFT CBT</strong>
        </a>
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-simple btn-icon btn-neutral btn-round">
            <i class="now-ui-icons text_align-center visible-on-sidebar-regular"></i>
            <i class="now-ui-icons design_bullet-list-67 visible-on-sidebar-mini"></i>
          </button>
        </div>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="{{ !empty(Auth::user()->userimage) ? asset(Auth::user()->userimage) : asset('assets/img/mike.jpg') }}" />
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                {{ Auth::user()->name }}
                <b class="caret"></b>
              </span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                
                <li class="">
                  <a href="passwordreset">
                    <span class="sidebar-mini-icon">UP</span>
                    <span class="sidebar-normal">Update Password</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                    <span class="sidebar-mini-icon">LO</span>
                    <span class="sidebar-normal">{{ __('Logout') }}</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          @if(Auth::user()->account_type == 'Candidate')
          <li>
            <a href="/cbt">
              <i class="now-ui-icons tech_laptop"></i>
              <p>Take New Test</p>
            </a>
          </li>
          @elseif(Auth::user()->account_type == 'Staff')
          <li>
            <a href="/cbt">
              <i class="now-ui-icons tech_laptop"></i>
              <p>Take New Test</p>
            </a>
          </li>
          <li>
            <a href="addquestions">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Load Questions</p>
            </a>
          </li>
          <li>
            <a href="newaccount">
              <i class="now-ui-icons users_single-02"></i>
              <p>Create User</p>
            </a>
          </li>
          <li>
            <a href="users">
              <i class="now-ui-icons ui-2_settings-90"></i>
              <p>Manage Users</p>
            </a>
          </li>
          @endif
          <li>
            <a href="previoustest">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>Previous Test</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <h4 class="navbar-brand"><b>Anti-Money Laundering / Combating the Financing of Terrorism</b></h4>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <!--<form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>-->
            <ul class="navbar-nav">
              <!--<li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>-->
              <li class="nav-item">
                <a class="nav-link" href="inbox">
                  <i class="now-ui-icons ui-1_email-85"><sup style="color:red; background-color:white; border-radius:40%; padding:1px 3px 4px 3px;"><strong></strong></sup></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      
      
  

