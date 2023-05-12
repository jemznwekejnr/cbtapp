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
                    <span class="d-lg-none d-md-block">Menus</span>
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
      <form action="submitcbt" id="cbtsubmits" name="cbtsubmits" method="post">
        {{ csrf_field() }}
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
                        <input type="hidden" name="timetaken" id="timetaken">
                        <input type="hidden" name="name" id="name" value="{{ $name }}">
                        <h4 class="info-title">{{ $name }}</h4>
                        <p align="center" class="">CBT in Progress</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        <p><strong>Exam Type:</strong></p><h4 class="info-title">{{ $examtype }}</h4>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                      <input type="hidden" name="subject" id="subject" value="{{ $subject }}">
                        <p><strong>Subject:</strong></p><h4 class="info-title">{{ $subject }}</h4>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                      <input type="hidden" name="year" id="year" value="{{ $year }}">
                        <p><strong>Year:</strong></p><h4 class="info-title">{{ $year }}</h4>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        <input type="hidden" name="test_id" id="test_id" value="{{ $test_id }}">
                        <p><strong>Time Left:</strong></p><h5 class="info-title" id="timing"></h5>

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
                  
                  <div class="col-md-2">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-info">
                        </div>
                        <h3 class="info-title" id="qn">Q1</h3>
                        <p class="stats-title"></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-10">
                    <!--<div class="statistics">-->
                      <div class="info">
                        <div class="icon icon-danger">
                        </div>
                        
                        
                        @isset($questions)

                         @include('processes.questions')
                        
                        @endisset

                           
                        
                        
                      </div>
                    <!--</div>-->

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
                  
                  <div class="col-md-9 pr-1">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-info">
                        </div>
                        <div id="btn1to10">
                          <button type="button" class="btn btn-round btn-danger" id="btn1">1</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn2">2</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn3">3</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn4">4</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn5">5</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn6">6</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn7">7</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn8">8</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn9">9</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn10">10</button>
                        </div>
                        <div id="btn11to20">
                          <button type="button" class="btn btn-round btn-danger" id="btn11">11</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn12">12</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn13">13</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn14">14</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn15">15</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn16">16</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn17">17</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn18">18</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn19">19</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn20">20</button>
                        </div>
                        <div id="btn21to30">
                          <button type="button" class="btn btn-round btn-danger" id="btn21">21</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn22">22</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn23">23</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn24">24</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn25">25</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn26">26</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn27">27</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn28">28</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn29">29</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn30">30</button>
                        </div>
                        <div id="btn31to40">
                          <button type="button" class="btn btn-round btn-danger" id="btn31">31</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn32">32</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn33">33</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn34">34</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn35">35</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn36">36</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn37">37</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn38">38</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn39">39</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn40">40</button>
                        </div>
                        <div id="btn41to50">
                          <button type="button" class="btn btn-round btn-danger" id="btn41">41</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn42">42</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn43">43</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn44">44</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn45">45</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn46">46</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn47">47</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn48">48</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn49">49</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn50">50</button>
                        </div>
                        <div id="btn51to60">
                          <button type="button" class="btn btn-round btn-danger" id="btn51">51</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn52">52</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn53">53</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn54">54</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn55">55</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn56">56</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn57">57</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn58">58</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn59">59</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn60">60</button>
                        </div>
                        <div id="btn61to70">
                          <button type="button" class="btn btn-round btn-danger" id="btn61">61</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn62">62</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn63">63</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn64">64</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn65">65</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn66">66</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn67">67</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn68">68</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn69">69</button>
                          <button type="button" class="btn btn-round btn-danger" id="btn70">70</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 pl-1">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-danger">
                        </div> 
                        <button type="button" class="btn btn-round btn-warning" id="previous"> << Previous </button>
                        <button type="button" class="btn btn-round btn-info" id="next">Next >></button>
                        <button type="submit" class="btn btn-round btn-success" id="btnsubmit">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        </form>
    

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

@include('processes.displayquestions')
