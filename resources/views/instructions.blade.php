@include('layouts.extension')

    
        <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #999999; border-radius: 3px;">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                @if (Route::has('login'))
                 @auth

                         <a class="dropdown-item" href="/cbt">
                          <i class="now-ui-icons tech_laptop"></i>
                          Take New Test
                        </a>
                        
                        <a class="dropdown-item" href="previoustest">
                          <i class="now-ui-icons files_single-copy-04"></i>Previous Test</a>

                        @if(Auth::user()->account_type == 'Staff')
                      
                        <a class="dropdown-item" href="addquestions">
                          <i class="now-ui-icons design_bullet-list-67"></i>
                          Load Questions
                        </a>
                      
                        <a class="dropdown-item" href="newaccount">
                          <i class="now-ui-icons users_single-02"></i>
                          Create User
                        </a>
                        
                        <a class="dropdown-item" href="users">
                          <i class="now-ui-icons ui-2_settings-90"></i>
                          Manage Users
                        </a>
                      
                      @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                          <i class="now-ui-icons media-1_button-power"></i>Logout
                          
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      
                    @else
                        <a class="dropdown-item" href="{{ route('login') }}"><i class="now-ui-icons media-1_button-power"></i>Login</a>

                        
                    @endauth
                @endif
                  
                </div>
              </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
        <div class="col-md-11 ml-auto mr-auto cbtheader">
        <img src="{{ asset('assets/img/cfc-header.png') }}" width="90%" style="margin-top: -120px;">
      </div>
        <canvas"></canvas>

      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-primary">
                          <i class="now-ui-icons business_chart-bar-32"></i>
                        </div>
                        <h3 class="info-title">Instructions</h3>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-8">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        <p align="justify" class="">Dear {{ $_GET['name'] }}, <br /><br />For participating in the training, you are about to undertake a {{ $_GET['examtype'] }}. In an alloted time of 70 minutes, you are expected to attempt 70 multiple choice questions. You time begins when you click on <b>Start Test.</b><br /><br />Once your test is on, do not attempt to reload your page or navigate to the previous or next page using the arrow buttons at the top of your browser as this will automatically disqualify you. Only use the buttons displayed on your page for moving to the next and previous questions.<br /><br />Best of luck. </p>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  
                  
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                    <form action="starttest" id="teststarts" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="name" id="name" value="{{ $_GET['name'] }}">
                      <input type="hidden" name="email" id="email" value="{{ $_GET['email'] }}">
                      <input type="hidden" name="organization" id="organization" value="{{ $_GET['organization'] }}">
                      <input type="hidden" name="designation" id="designation" value="{{ $_GET['designation'] }}">
                      <input type="hidden" name="examtype" id="examtype" value="{{ $_GET['examtype'] }}">
                      <input type="hidden" name="subject" id="subject" value="{{ $_GET['subject'] }}">
                      <input type="hidden" name="year" id="year" value="{{ $_GET['year'] }}">
                     <button type="submit" class="btn btn-info btn-round"><br /><h1><strong>Start Test</strong></h1></button> 
                     </form>
                   </div>


                </div>
              </div>
            </div>
          </div>
        </div>

        
    

        @include('layouts.footers')
    </div>
  </div>-->


  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('assets/js/plugins/sweetalert2.min.js') }}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.js') }}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('assets/js/plugins/jquery-jvectormap.js') }}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.4.1') }}" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
  <script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      demo.initDateTimePicker();
      if ($('.slider').length != 0) {
        demo.initSliders();
      }
    });
  </script>
</body>

</html>

@include('processes.testpreparation')
