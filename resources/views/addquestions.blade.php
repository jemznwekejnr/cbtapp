@include('layouts.extensions')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-9">
                <h5 class="title">Add New Questions</h5>
                  </div>
                  <div class="col-md-3 float-right">
                    <button class="btn btn-round btn-warning" id="passagebutton">Add Passage</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form id="newquestion" action="submitquestion" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <p id="message" class="alert"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Exam Type</label>
                          <select id="examtype" class="form-control selectpicker" name="examtype" data-style="btn-round" required>
                            <option value="">Select Exam Type</option>
                          <option>ICT Training</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Course/Subject</label>
                        <select type="text" class="form-control selectpicker" id="subject" data-style="btn-round" name="subject" required>
                          <option value="">Select Course/Subject</option>
                          <option>Web Application Development</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Year</label>
                          <select id="year" class="form-control selectpicker" name="year" data-style="btn-round" required>
                            <option value="">Select Year</option>
                            @for($i = 2021; $i <= date('Y'); $i++)
                              <option>{{ $i }}</option>
                            @endfor
                          </select>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Question Type</label>
                          <select id="question1type" class="form-control selectpicker" data-style="btn-round" name="questiontype">
                            <option>Text Only</option>
                            <option>Image Only</option>
                            <option>Text and Image</option>
                          </select>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-12" id="passagebt">
                      <div class="form-group">
                        <label>Passage</label>
                        <textarea name="passage" id="passage" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" id="tquestion">
                      <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="textquestion" id="textquestion" class="form-control" placeholder="Question">
                      </div>
                    </div>
                    <div class="col-md-4" id="iquestion">
                      <div class="form-group">
                        <label>Question</label>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" name="imagequestion" id="imagequestion" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-9" id="tiquestion">
                      <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="textimagequestion" id="textimagequestion" class="form-control" placeholder="Question">
                      </div>
                    </div>
                    <div class="col-md-3" id="itquestion">
                      <div class="form-group">
                        <label>Question</label>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" name="imagetextquestion" id="imagetextquestion" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Option 1 Type</label>
                          <select id="option1type" class="form-control selectpicker" data-style="btn-round" name="option1type">
                            <option>Text Only</option>
                            <option>Image Only</option>
                            <option>Text and Image</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-8 pl-1" id="option1t">
                      <div class="form-group">
                        <label>Option 1</label>
                          <input type="text" name="option1text" id="option1text" class="form-control" placeholder="Option One">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1" id="option1i">
                      <div class="form-group">
                        <label>Option 1</label>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" id="option1image" name="option1image" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 px-1" id="option1ti">
                      <div class="form-group">
                        <label>Option 1</label>
                          <input type="text" name="option1textimage" id="option1textimage" class="form-control" placeholder="Option One">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1" id="option1it">
                      <div class="form-group">
                        <label>Option 1</label>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" id="option1imagetext" name="option1imagetext" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Option 2 Type</label>
                          <select id="option2type" class="form-control selectpicker" data-style="btn-round" name="option2type">
                            <option>Text Only</option>
                            <option>Image Only</option>
                            <option>Text and Image</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-8 pl-1" id="option2t">
                      <div class="form-group">
                        <label>Option 2</label>
                          <input type="text" name="option2text" id="option2text" class="form-control" placeholder="Option Two">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1" id="option2i">
                      <div class="form-group">
                        <label>Option 2</label>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" id="option2image" name="option2image" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 px-1" id="option2ti">
                      <div class="form-group">
                        <label>Option 2</label>
                          <input type="text" name="option2textimage" id="option2textimage" class="form-control" placeholder="Option Two">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1" id="option2it">
                      <div class="form-group">
                        <label>Option 2</label>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" id="option2imagetext" name="option2imagetext" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Option 3 Type</label>
                          <select id="option3type" class="form-control selectpicker" data-style="btn-round" name="option3type">
                            <option>Text Only</option>
                            <option>Image Only</option>
                            <option>Text and Image</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-8 pl-1" id="option3t">
                      <div class="form-group">
                        <label>Option 3</label>
                          <input type="text" name="option3text" id="option3text" class="form-control" placeholder="Option Three">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1" id="option3i">
                      <div class="form-group">
                        <label>Option 3</label>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" id="option3image" name="option3image" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 px-1" id="option3ti">
                      <div class="form-group">
                        <label>Option 3</label>
                          <input type="text" name="option3textimage" id="option3textimage" class="form-control" placeholder="Option Three">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1" id="option3it">
                      <div class="form-group">
                        <label>Option 3</label>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" id="option3imagetext" name="option3imagetext" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Option 4 Type</label>
                          <select id="option4type" class="form-control selectpicker" data-style="btn-round" name="option4type">
                            <option>Text Only</option>
                            <option>Image Only</option>
                            <option>Text and Image</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-8 pl-1" id="option4t">
                      <div class="form-group">
                        <label>Option 4</label>
                          <input type="text" name="option4text" id="option4text" class="form-control" placeholder="Option Four">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1" id="option4i">
                      <div class="form-group">
                        <label>Option 4</label>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" id="option4image" name="option4image" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 px-1" id="option4ti">
                      <div class="form-group">
                        <label>Option 4</label>
                          <input type="text" name="option4textimage" id="option4textimage" class="form-control" placeholder="Option Four">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1" id="option4it">
                      <div class="form-group">
                        <label>Option 4</label>
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" id="option4imagetext" name="option4imagetext" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div id="morequestions"></div>
                  <div id="number"></div>
                  <div id="modal"></div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Correct Answer</label>
                          <select id="correctanswer" class="form-control selectpicker" data-style="btn-round" name="correctanswer" required>
                            <option value="">Select the right answer</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                          </select>
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
                          <button type="submit" id="" class="btn btn-round btn-success">Submit</button>
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

