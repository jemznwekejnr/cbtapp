@include('layouts.extension')
<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Shop Product Sales Form</h5>
              </div>
              <div class="card-body">
                <form id="shopsalesid" action="submitshopsales" method="post">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>No of Items</label>
                          <p class="form-control" id="noofitems">0</p>
                        <input type="hidden" class="form-control" id="selecteditems" name="selecteditems">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Total Amount (&#8358;)</label>
                        <p class="form-control" id="tamount">0.00</p>
                        <input type="hidden" class="form-control" id="totalamount" name="totalamount">
                      </div>
                    </div>
                    <div class="col-md-7 pl-1">
                      <div class="form-group">
                          <textarea class="form-control textarea" name="comments" id="comments" placeholder="Additional Comment"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
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
                        <input type="text" list="selectproducts1" name="products[]" id="products1" class="form-control" placeholder="Product Name" required>
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
                          <input type="text" name="unitprice[]" id="unitprice1" onkeypress="return isNumberKey(event)" class="form-control" placeholder="0.00">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Quantity</label>
                          <input type="text" name="quantity[]" id="quantity1" onkeypress="return isNumberKey(event)" class="form-control" placeholder="0">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Total Price (NGN)</label>
                          <input type="text" name="totalprice[]" id="totalprice1" onkeypress="return isNumberKey(event)" class="form-control" placeholder="0.00">
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
                  <input type="hidden" id="request_type" value="Cash Sales">
                  @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Shop Sales', 'Create') == 'allow')
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
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Submit Sales">
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