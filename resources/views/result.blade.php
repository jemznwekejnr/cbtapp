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
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-primary">
                          <i class="now-ui-icons users_single-02"></i>
                        </div>
                        <h4 class="info-title">{{ $test_result[0]->name }}</h4>
                        <p align="center" class="">CBT Result</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        <p><strong>Exam Type:</strong></p><h4 class="info-title">{{ $test_result[0]->exam_type }}</h4>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        <p><strong>Subject:</strong></p><h4 class="info-title">{{ $test_result[0]->subject }}</h4>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        <p><strong>Year:</strong></p><h4 class="info-title">{{ $test_result[0]->year }}</h4>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        <p><strong>No of Questions</strong></p><h4 class="info-title">{{ $test_result[0]->total_score }}</h4>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <div class="row">
          <div class="col-md-12">
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-primary">
                          
                        </div>
                        <p><strong>Email:</strong></p><h4 class="info-title">{{ $test_result[0]->email }}</h4>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        <p><strong>Organization:</strong></p><h4 class="info-title">{{ $test_result[0]->organization }}</h4>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        <p><strong>Designation:</strong></p><h4 class="info-title">{{ $test_result[0]->designation }}</h4>

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
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    
                      <div class="info">
                        <div class="icon icon-primary">
                        </div>
                        <center>
                        <p><strong>Test Result</strong></p>
                        <h3 class="info-title">Score: {{ $test_result[0]->user_score }}</h3>
                        <h3 class="info-title">Percentage: {{ $test_result[0]->user_percentage }}%</h3>
                        <!--<h3 class="info-title">Average Time: {{ $averagetime }}seconds / question</h3>-->
                      </center>
                      </div>
                    
                  </div>
                  <div class="col-md-3"></div>
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
                  
                  <div class="col-md-3"></div>
                  <div class="col-md-6 pl-1">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div> 
                        <!--<a href="/"><button type="button" class="btn btn-round btn-warning" id="previous"> Take Another Test </button></a>-->
                        @if($test_result[0]->status != 'Suspended')
                        <a href="resultdetails?test_id={{ $test_result[0]->test_id }}"><button class="btn btn-round btn-info" id="next">Display Result Details</button></a>
                        @endif
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


