@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Payment Details</h5>
              </div>
              <div class="card-body">
                <form id="paymentupdate" action="updatepayment" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                
                  <input type="hidden" name="id" value="{{ $payments[0]->id }}">
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label>Name</label>
                        <p class="form-control" id="name" name="name">{{ $payments[0]->name }}</p>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <p type="text" name="phone" id="phone" class="form-control">{{ $payments[0]->phone }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <p type="text" name="email" id="email" class="form-control">{{ $payments[0]->email }}</p>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Participation Type</label>
                        <p name="participant" id="participant" class="form-control">{{ $payments[0]->participationtype }}</p>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Total Participants</label>
                        <p type="number" name="noofparticipants" id="noofparticipants" class="form-control">{{ $payments[0]->totalparticipant }}</p>
                      </div>
                    </div>
                  </div>
                  @if($payments[0]->participationtype == 'State' || $payments[0]->participationtype == 'LGA')
                  <div class="row content" id="location">
                  <div class="col-lg-4 pr-1">
                      <div class="form-group">
                          <label>Geopolitical  Zone</label>
                          <p name="geozone" id="geozone" class="form-control">{{ $payments[0]->zone }}</p>
                      </div>
                  </div>
                  <div class="col-lg-4 px-1">
                      <div class="form-group">
                          <label>State</label>
                          <p name="states" id="states" class="form-control">{{ $payments[0]->state }}</p>
                      </div>
                  </div>
                  @if($payments[0]->participationtype == "LGA")
                  <div class="col-lg-4 pl-1" id="lga">
                      <div class="form-group">
                          <label>Local Government</label>
                          <p name="lgas" id="lgas" class="form-control">{{ $payments[0]->lga }}</p>
                      </div>
                  </div>
                  @endif
                 </div>
                 @endif
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Amount Paid</label>
                        <p type="number" name="amountpay" id="amountpay" class="form-control">{{ $payments[0]->amountpaid }}</p>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Payment Method</label>
                        <p name="paymentmethod" id="paymentmethod" class="form-control">{{ $payments[0]->paymentmethod }}</p>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Payment Status</label>
                        <p name="paymentstatus" id="paymentstatus" class="form-control">{{ $payments[0]->paymentstatus }}</p>
                      </div>
                        
                      </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Payment Date</label>
                        <p id="created_at" class="form-control">{{ $payments[0]->created_at }}</p>
                      </div>
                    </div> 
                    
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Update Payment Status</label>
                        <select name="paymentstatus" id="paymentstatus" class="form-control" required>
                          <option>{{ $payments[0]->paymentstatus }}</option>
                          <option>Confirmed</option>
                          <option>Pending Confirmation</option>
                          @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Payments', 'Edit') == 'allow')
                          <option>Declined</option>
                          @endif
                          </select>
                        
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Last Updated</label>
                        <p id="updated_at" class="form-control">{{ $payments[0]->updated_at }}</p>
                      </div>
                    </div>
                    <div class="col-md-5 pl-1">
                      <div class="form-group">
                        <label>Updated By</label>
                        <p id="paymentproof" class="form-control">@php echo App\Http\Controllers\Controller::getusername($payments[0]->updated_by) @endphp</p>
                      </div>
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
                      <label>Payment Proof</label>
                        @if($payments[0]->paymentmethod == "Manual Payment")
                        <a href="{{  url($payments[0]->paymentproof) }}" target="_blank"><button type="button" class="btn btn-round btn-danger">View Payment Proof</button></a>
                        @elseif($payments[0]->paymentmethod == "Card Payment")
                        <p id="paymentproof" class="form-control">{{ $payments[0]->paymentproof }}</p>
                        @endif
                    
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Payments', 'Edit') == 'allow')
                    <div class="col-md-3 pr-1 float-right">
                      <div class="form-group">
                        
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update Payment">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                        
                      </div>
                    </div>
                    @endif
                  </div>
                  
                </form>

               
              </div>
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
@include('layouts.footer')
@include('process.payments')