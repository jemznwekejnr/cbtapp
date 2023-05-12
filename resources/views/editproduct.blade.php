@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">New Product Category</h5>
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
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Product Category</label>
                        <select class="form-control selectpicker" data-style="btn-round">
                          <option>Select Category</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Packaging</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Unit Price</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Additional Comment</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Created By</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Created At</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="" required>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Last Modified</label>
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