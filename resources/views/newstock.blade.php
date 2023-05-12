@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Update Stock</h5>
              </div>
              <div class="card-body">
                <form id="newproduct" action="addnewproduct" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="productname" id="productname" class="form-control" placeholder="Product Name" list="productnames" required>
                        <datalist id="productnames">
                          @isset($products)
                            @foreach($products as $product)
                            <option>{{ $product->productname }}</option>
                            @endforeach
                          @endisset
                        </datalist>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="brandname" id="brandname" class="form-control" placeholder="Brand Name" value="" list="brandnames" required>
                        <datalist id="brandnames">
                          @isset($brands)
                            @foreach($brands as $brand)
                            <option>{{ $brand->brand }}</option>
                            @endforeach
                          @endisset
                        </datalist>
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Product Category</label>
                        <select class="form-control selectpicker" name="category" id="category" data-style="btn-round">
                          <option>Select Category</option>
                          @isset($categorys)
                            @foreach($categorys as $category)
                            <option>{{ $category->category }}</option>
                            @endforeach
                          @endisset
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Packaging</label>
                        <input type="text" name="packaging" id="packaging" class="form-control" placeholder="Packaging" value="" list="packagings" required>
                        <datalist id="packagings">
                          @isset($packagings)
                            @foreach($packagings as $packaging)
                            <option>{{ $packaging->packaging }}</option>
                            @endforeach
                          @endisset
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Cash Sales Price (&#8358;)</label>
                        <input type="text" name="cashprice" id="cashprice" class="form-control" placeholder="0.00" min="0.00" required>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Credit Sales Price (&#8358;)</label>
                        <input type="text" name="creditprice" id="creditprice" class="form-control" min="0.00" placeholder="0.00" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Size</label>
                        <input type="text" list="size" name="sizes" id="sizes" class="form-control" placeholder="Size" value="" required>
                        <datalist id="size">
                          @isset($sizes)
                            @foreach($sizes as $size)
                            <option>{{ $size->size }}</option>
                            @endforeach
                          @endisset
                      </div>
                    </div>
                    <div class="col-md-9 pl-1">
                      <div class="form-group">
                        <label>Additional Comment</label>
                        <input type="text" name="comments" id="comments" class="form-control" placeholder="Additional Comment" value="" >
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
                  @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'New Stock', 'Create') == 'allow')
                  <div class="row">
                    <div class="col-md-4">
                      
                    
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group float-right">
                      <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update Stock">
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