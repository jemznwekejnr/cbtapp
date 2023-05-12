@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Cooperative Savings Withdrawal Request</h5>
              </div>
              <div class="card-body">
                <form id="withdrawalrequest" action="submitwithdrawal" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <p id="message" class="alert"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>IPPIS</label>
                        <input type="text" name="ippis" id="ippis" class="form-control" placeholder="Loan Type" value="{{ Auth::user()->ippisnumber }}" required>
                      </div>
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                        <label>Member Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Loan Type" value="{{ Auth::user()->name }}" readonly required>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Savings (&#8358;)</label>
                        <input type="text" name="savings" id="savings" class="form-control" placeholder="Loan Type" value="{{ $savings }}" readonly required>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Months Saved (&#8358;)</label>
                        <input type="text" name="months" id="months" class="form-control" placeholder="Loan Type" value="{{ $months }}" readonly required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Amount Requested (&#8358;)</label>
                        <input type="text" name="requestedamount" id="name" class="form-control" placeholder="Requested Amount" value="" required>
                      </div>
                    </div>
                    <div class="col-md-9 pl-1">
                      <div class="form-group">
                        <label>Additional Comment</label>
                        <input type="text" name="comment" id="comment" class="form-control" placeholder="Additional Comment" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Manage Withdrawal', 'Edit') == 'allow')
                      <label>Status</label>
                      <select class="selectpicker form-control" name="status" id="status" data-style="btn-round">
                          <option>Pending Confirmation</option>
                          <option>Confirmed</option>
                          <option>Disbursed</option>
                      </select>
                      @else
                      <input type="hidden" name="status" id="status" value="Pending Confirmation">
                    @endif
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group float-right">
                        
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Submit Request">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                        
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
@include('process.withdrawal')