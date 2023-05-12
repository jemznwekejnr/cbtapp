@include('layouts.extensions')

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-9">
                <h5 class="title">Registered Users</h5>
                  </div>
                  <div class="col-md-3 float-right">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Account Type</th>
                      <th>Account Status</th>
                      <th>Created At</th>
                      <th class="disabled-sorting ">Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Account Type</th>
                      <th>Account Status</th>
                      <th>Created At</th>
                      <th class="disabled-sorting ">Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                    @isset($users)
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->account_type }}</td>
                      <td>{{ $user->account_status }}</td>
                      <td>{{ $user->created_at }}</td>
                      <td class="">
                        <a href="manageuser?id={{ $user->id }}" class="btn btn-round btn-info btn-icon btn-sm like"><i class="fas fa-edit"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    @endisset
                  </tbody>
                </table>
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
  <script>
    $(document).ready(function() {
      $('#datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }

      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }
        table.row($tr).remove().draw();
        e.preventDefault();
      });
    });
  </script>
</body>

</html>



