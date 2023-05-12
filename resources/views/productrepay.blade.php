@include('layouts.extension')
<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Loan Re-Payment Form</h5>
              </div>
              <div class="card-body">
                <form id="cooperativepay" action="submitcooperative" method="post">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div id="message" class="alert"></div>
                      </div>
                    </div>
                  </div>
                  @php $amount = 2000 @endphp
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Loan ID</label>
                          <p class="form-control"></p>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Amount Collected(NGN)</label>
                        <p class="form-control" id="tmonth">1</p>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Amount Repaid (NGN)</label>
                        <p class="form-control tamount" id="tamount"></p>
                        <input type="hidden" class="tamount" id="amount" value="" name="amount">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Member Name</label>
                          <p class="form-control"></p>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="exampleInputEmail1"># of Months</label>
                        <p class="form-control" id="tmonth">1</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Total Amount (NGN)</label>
                        <p class="form-control tamount" id="tamount"></p>
                        <input type="hidden" class="tamount" id="amount" value="" name="amount">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Month</label>
                          <input type="month" name="month1" id="month1" class="form-control" value="{{ date('Y-m') }}">
                      </div>
                    </div>
                    <div class="col-md-5 pl-1">
                      <div class="form-group">
                        <label>Amount (NGN)</label>
                          <p class="form-control"></p>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        
                        </div>
                    </div>
                  </div>
                  <div id="moremonths"></div>
                  <div id="number"></div>
                  <div id="modal"></div>
                  <div class="row">
                    <div class="col-md-3 pr-1">
                    <input type="button" id="addmore" class="btn btn-round btn-info" value="Add more">
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">

                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <!--<a href="monthlypayment">-->
                          <button type="submit" id="submitbutton"><img src="{{ 'assets/img/paynow.png' }}"></button>
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
@include('process.cooperativerepay')