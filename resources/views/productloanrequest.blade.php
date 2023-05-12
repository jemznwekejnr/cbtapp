@include('layouts.extension')
<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Shop Loan Request Form</h5>
              </div>
              <div class="card-body">
                <form id="shoploanrequest" action="submitshoploanrequest" method="post">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>IPPIS Number</label>
                          <input type="text" class="form-control" id="ippis" placeholder="Staff IPPIS" name="ippis">
                      </div>
                    </div>
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="ippis" placeholder="Staff Full Name" name="name">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>No of Items</label>
                          <p class="form-control" id="noofitems">0</p>
                        <input type="hidden" class="form-control" id="selecteditems" name="selecteditems">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Total Amount (&#8358;)</label>
                        <p class="form-control" id="tamount">0.00</p>
                        <input type="hidden" class="form-control" id="totalamount" name="totalamount">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Account Type</label>
                        <select class="selectpicker form-control" data-style="btn-round" name="accounttype" required id="accounttype">
                          <option value="">Select Account Type</option>
                          <option>Cooperative Member</option>
                          <option>Non-Cooperative Member</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Tenure (Months)</label>
                        <select class="selectpicker form-control" data-style="btn-round" name="tenure" id="tenure">
                          <option value="">Select Tenure</option>
                          @for($i=1; $i<=12; $i++)
                          <option>{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Non-Member Fee (5%)</label>
                        <p class="form-control" id="nonmemberfee">0.00</p>
                        <input type="hidden" class="form-control" id="nonmemberextrafee" name="nonmemberextrafee">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Repayable Amount (&#8358;)</label>
                        <p class="form-control" id="amountpayable">0.00</p>
                        <input type="hidden" class="form-control" id="payableamount" name="payableamount">
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Monthly Repayment (&#8358;)</label>
                        <p class="form-control" id="repayment">0.00</p>
                        <input type="hidden" class="form-control" id="monthlyamount" name="monthlyamount">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Comment</label>
                          <textarea class="form-control textarea" name="comments" id="comments" placeholder="Additional Comment"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div id="message" class="alert"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Product</label>
                        <input type="text" list="selectproducts1" name="products[]" id="products1" class="form-control selectedproduct" placeholder="Select Product" data-product="1" required>
                        <datalist id="selectproducts1">
                          @isset($products)
                            @foreach($products as $product)
                            <option>{{ $product->id }} - {{ $product->productname }}, ({{ $product->brand }}, {{ $product->size }} - {{ $product->category }})</option>
                            @endforeach
                          @endisset
                        </datalist>
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Unit Price (NGN)</label>
                          <input type="text" name="unitprice[]" id="unitprice1" onkeypress="return isNumberKey(event)" class="form-control unitprices" data-price="1" placeholder="0.00">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Quantity</label>
                          <input type="text" name="quantity[]" id="quantity1" onkeypress="return isNumberKey(event)" class="form-control quantities" data-quatity="1" placeholder="0">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Total Price (NGN)</label>
                          <input type="text" name="totalprice[]" id="totalprice1" onkeypress="return isNumberKey(event)" class="form-control" data-total="1" placeholder="0.00">
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
                  <input type="hidden" id="request_type" value="Credit Sales">
                  @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Credit Request', 'Create') == 'allow')
                  <div class="row">
                    <div class="col-md-3 pr-1">
                    <input type="button" id="addmore" class="btn btn-round btn-info" value="Add more">
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">

                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group float-right">
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Submit Request">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                      </div>
                    </div>
                  </div>
                  @endif
                </form>
              </div>
            </div>
          </div>
    @include('layouts.profile')

            </div>
          </div>
@include('layouts.footer')
@include('process.products')