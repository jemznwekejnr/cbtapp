@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Upload Cash Loan Repayment (Excel file only)</h5>
              </div>
              <div class="card-body">
                <form id="uploadcashloan" action="submitcashloansupload" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-9 pr-1">
                      <div class="form-group">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select Excel File</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" name="savings" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>
                      </div>
                    <div class="col-md-3 pl-1">
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Upload Savings">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                    </div>
                    </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <p id="message" class="alert"></p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4">
                      
                    
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        
                        
                        
                      </div>
                    </div>
                  </div>
                  
                </form>

               
              </div>
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
@include('layouts.footer')
@include('process.fileuploads')