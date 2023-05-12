@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Shop Products</h5>
      </div>
  <div class="card-body">
  <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Packaging</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Cash Price</th>
        <th>Credit Price</th>
        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Products', 'Edit') == 'allow')
        <th class="disabled-sorting text-right">Actions</th>
        @endif
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Packaging</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Cash Price</th>
        <th>Credit Price</th>
        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Products', 'Edit') == 'allow')
        <th class="disabled-sorting text-right">Actions</th>
        @endif
      </tr>
    </tfoot>
    <tbody>
      @isset($products)
      @foreach($products as $product)

      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->productname }}</td>
        <td>{{ $product->brand }}</td>
        <td>{{ $product->category }}</td>
        <td>{{ $product->packaging }}</td>
        <td>{{ $product->size }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->cashprice }}</td>
        <td>{{ $product->creditprice }}</td>
        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Products', 'Edit') == 'allow')
        <td class="text-right">
          <a href="productdetails/?id={{ $product->id }}" class="btn btn-round btn-warning btn-icon btn-sm edit"><i class="far fa-calendar-alt"></i></a>
        </td>
        @endif
      </tr>

      @endforeach
      @endisset
      
    </tbody>
  </table>
</div>
    </div>
  </div>
</div>
</div>
@include('layouts.footer')
@include('process.users')