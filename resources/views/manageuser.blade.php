@include('layouts.extensions')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-9">
                <h5 class="title">Manage User Account</h5>
                  </div>
                  <div class="col-md-3 float-right">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form id="accountupdate" action="updateaccount" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <p id="message" class="alert"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ $user[0]->name }}">
                        <input type="hidden" name="id" id="id" value="{{ $user[0]->id }}">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Account Status</label>
                          <select id="accountstatus" class="form-control selectpicker" data-style="btn-round" name="accountstatus" required>
                            <option>{{ $user[0]->account_status }}</option>
                            <option>Active</option>
                            <option>Inactive</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Account Type</label>
                          <select id="accounttype" class="form-control selectpicker" data-style="btn-round" name="accounttype" required>
                            <option>{{ $user[0]->account_type }}</option>
                            <option>Staff</option>
                            <option>Candidate</option>
                          </select>
                      </div>
                    </div>
                    
                  </div>
                  
                  <div id="morequestions"></div>
                  <div id="number"></div>
                  <div id="modal"></div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <!--<input type="button" id="addmore" class="btn btn-round btn-info" value="Add more">-->
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group float-right">
                        <!--<a href="monthlypayment">-->
                          <button type="submit" id="" class="btn btn-round btn-success">Update</button>
                      </div>
                    </div>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{ 'assets/img/bg5.jpg' }}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <!--<a href="#">-->
                    <img class="avatar border-gray" src="{{ isset(Auth::user()->userimage) ? Auth::user()->userimage : 'assets/img/mike.jpg' }}" alt="...">
                    <h5 class="title">{{ Auth::user()->name }}</h5>
                  <!--</a>-->
                  <p class="description">
                    {{ Auth::user()->email }}<br />
                    
                  </p>
                </div>
                <p class="description text-center">
                  
                </p>
              </div>
              <p class="description text-center">
                  <a href="#"></a>
                </p>
              <hr>
              <div class="button-container">
                <p class="description text-center">
                  <button type="button" class="btn btn-round btn-success">Active</button>
                </p>
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


@include('processes.addquestion')
