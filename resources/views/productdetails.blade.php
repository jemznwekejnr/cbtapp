@include('layouts.extension')
<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Shop Loan Request Update</h5>
              </div>
              <div class="card-body">
                <form id="shoploanupdate" action="updateshoploanrequest" method="post">
                  {{ csrf_field() }}
                  @isset($product)
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>IPPIS Number</label>
                          <input type="text" class="form-control" id="ippis" value="{{ $product[0]->ippisnumber }}" name="ippis">
                          <input type="hidden" name="id" value="{{ $product[0]->id }}">
                      </div>
                    </div>
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="ippis" value="{{ $product[0]->name }}" name="name">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Account Type</label>
                        <select class="selectpicker form-control" data-style="btn-round" name="accounttype" id="accounttype">
                          <option>{{ $product[0]->accounttype }}"</option>
                          <option>Cooperative Member</option>
                          <option>Non-Cooperative Member</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>No of Items</label>
                          <p class="form-control" id="noofitems">{{ $product[0]->numberofitems }}</p>
                        <input type="hidden" class="form-control" id="selecteditems" value="{{ $product[0]->numberofitems }}" name="selecteditems">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Total Amount (&#8358;)</label>
                        <p class="form-control" id="tamount">{{ $product[0]->loanamount }}</p>
                        <input type="hidden" class="form-control" id="totalamount" value="{{ $product[0]->loanamount }}" name="totalamount">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Tenure (Months)</label>
                        <select class="selectpicker form-control" data-style="btn-round" name="tenure" id="tenure">
                          <option>{{ $product[0]->duration }}</option>
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
                        <label>Non-Member Fee 5% (&#8358;)</label>
                          <p class="form-control" id="nonmemberextrafee">{{ $product[0]->nonmemberfee }}</p>
                        <input type="hidden" class="form-control" id="nonmemberfee" value="{{ $product[0]->nonmemberfee }}" name="nonmemberfee">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Repayable Amount (&#8358;)</label>
                        <p class="form-control" id="amountpayable">{{ $product[0]->payableamount }}</p>
                        <input type="hidden" class="form-control" id="payableamount" value="{{ $product[0]->payableamount }}" name="payableamount">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Monthly Repayment</label>
                        <p class="form-control" id="repayment">{{ $product[0]->monthlyamount }}</p>
                        <input type="hidden" class="form-control" id="monthlyamount" name="monthlyamount">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Status</label>
                        <select id="status" name="status" class="form-control selectpicker" data-style="btn-round">
                          <option>{{ $product[0]->status }}</option>
                          <option>Repaid Completely</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-8 pl-1">
                      <div class="form-group">
                        <label>Comment</label>
                          <textarea class="form-control textarea" name="comments" id="comments" placeholder="Additional Comment">{{ $product[0]->comments }}</textarea>
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
                    <div class="col-md-3 pr-1">
                    <!--<input type="button" id="addmore" class="btn btn-round btn-info" value="Add more">-->
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">

                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group float-right">
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update Request">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                      </div>
                    </div>
                  </div>
                  @endisset
                  @isset($items)
                  @foreach($items as $item)
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Product</label>
                        <p class="form-control"> {{ $item->productnames }} </p>
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Unit Price (NGN)</label>
                          <p class="form-control"> {{ $item->unitprices }} </p>
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Quantity</label>
                          <p class="form-control"> {{ $item->quantities }} </p>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Total Price (NGN)</label>
                          <p class="form-control"> {{ $item->totalprices }} </p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endisset
                  <div id="moremonths"></div>
                  <div id="number"></div>
                  <div id="modal"></div>
                  
                  
                </form>
              </div>
            </div>
          </div>
    @include('layouts.profile')

            </div>
          </div>
@include('layouts.footer')
@include('process.products')