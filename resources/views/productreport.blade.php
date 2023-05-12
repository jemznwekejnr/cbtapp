@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Shop Loan Report</h5>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Account Type</th>
      <th>Requested Amount</th>
      <th>Duration</th>
      <th>Loan Status</th>
      <th>Total Repaid</th>
      <th>Months Completed</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Account Type</th>
      <th>Requested Amount</th>
      <th>Duration</th>
      <th>Loan Status</th>
      <th>Total Repaid</th>
      <th>Months Completed</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </tfoot>
  <tbody>
    @isset($products)
    @foreach($products as $product)

    <tr>
      <td>{{ $product->ippisnumber }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->accounttype }}</td>
      <td>{{ $product->payableamount }}</td>
      <td>{{ $product->duration }}</td>
      <td>{{ $product->status }}</td>
      <td>{{ $product->totalrepay }}</td>
      <td>{{ $product->monthscompleted }}</td>
      <td class="text-right">
        <a href="{{ url('productdetails/?product='.$product->id) }}" class="btn btn-round btn-warning btn-icon btn-sm"><i class="far fa-calendar-alt"></i></a>
      </td>
    </tr>

    @endforeach
    @endisset
    
  </tbody>
</table>
<div class="row">
  <div class="col-md-3">
    <strong>Total Request: &#8358;{{ number_format($loanamount, 2) }}</strong>
  </div>
  <div class="col-md-3">
    <strong>Total Repay: &#8358;{{ number_format($totalrepay, 2) }}</strong>
  </div>
</div>
</div>
    </div>
  </div>
</div>
</div>
@include('layouts.footer')
@include('process.users')