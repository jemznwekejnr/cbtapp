@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Define Cooperative Savings</h5>
              </div>
              <div class="card-body">
                <form id="updateprofile" action="profileupdate" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                
                <center><p id="" class="alert alert-warning">Please contact admin to activate your account.</p></center>
                
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
                        <label>Member ID</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Member Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Monthly Amount (&#8358;)</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
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
                    <div class="col-md-3 pl-1">
                      <div class="form-group float-right">
                        
                        <input type="submit" class="btn btn-round btn-info" value="Create New">
                        
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