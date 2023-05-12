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
      <div class="panel-header panel-header-lg">
        <div class="col-md-11 ml-auto mr-auto cbtheader">
        <img src="{{ asset('assets/img/cfc-header.png') }}" width="100%">
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
                        <h3 class="info-title">ICT Training CBT</h3>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-8">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        <p align="justify" class="">ICT Training CBT is a web based application developed by AndJemz Technology Nigeria Limited to evaluate the knowledge gained by our students during the ICT training classes. </p>
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
                  
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-info">
                        </div>
                        <h3 class="info-title">Take a Test</h3>
                        <p class="stats-title"></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        <form method="post" action="requesttest" id="testrequest">
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Full Name" value="@isset(Auth::user()->id){{ Auth::user()->name }} @endisset" @isset(Auth::user()->id) readonly @endisset required>
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Your Email Address" required>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="organization" id="organization" placeholder="Your Organization" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="designation" id="designation" placeholder="Your Designation" required>
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <select name="examtype" id="examtype" class="form-control " data-style="btn-round" required>
                                            <option value="">Exam Type</option>
                                            @foreach($exams as $exam)
                                            <option>{{ $exam->exam_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <select name="subject" id="subject" class="form-control " data-style="btn-round" required>
                                            <option value="">Course/Subject</option>
                                            @foreach($subjects as $subject)
                                            <option>{{ $subject->subject }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 pl-1">
                                    <div class="form-group">
                                        <select name="year" id="year" class="form-control " data-style="btn-round" required>
                                        <option value="">Year</option>
                                            @foreach($years as $year)
                                            <option>{{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    
                                </div>
                                <div class="col-md-4 px-1">
                                    
                                </div>
                                <div class="col-md-3 pl-1">
                                    <div class="form-group float-right">
                                        <button type="submit" id="submitrequest" class="btn btn-round btn-info">Start Test</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      @include('layouts.footers')
      
    </div>
  </div>


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
  <!--  Google Maps Plugin    --
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
