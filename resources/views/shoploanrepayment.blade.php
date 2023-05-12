@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Shop Loan Repayment</h5>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <tr>
      <th>Shop Loan ID</th>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Amount Paid</th>
      <th>Month</th>
      <th>Payment Status</th>
      <th>Account Type</th>
      <th>Date Paid</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Shop Loan ID</th>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Amount Paid</th>
      <th>Month</th>
      <th>Payment Status</th>
      <th>Account Type</th>
      <th>Date Paid</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </tfoot>
  <tbody>
    @isset($payments)
    @foreach($payments as $payment)

    <tr>
      <td>{{ $payment->productloanid }}</td>
      <td>{{ $payment->ippisnumber }}</td>
      <td>{{ $payment->name }}</td>
      <td>{{ $payment->amount }}</td>
      <td>{{ $payment->month }}</td>
      <td>{{ $payment->paymentstatus }}</td>
      <td>{{ $payment->accounttype }}</td>
      <td>{{ $payment->created_at }}</td>
      <td class="text-right">
        <a href="{{ url('loanpaymentdetails/?payment='.$payment->id) }}" class="btn btn-round btn-warning btn-icon btn-sm edit"><i class="far fa-calendar-alt"></i></a>
      </td>
    </tr>

    @endforeach
    @endisset
    
  </tbody>
</table>
@isset($total)
<strong>Total: &#8358;{{ number_format($total, 2) }}</strong>
@endisset
</div>
    </div>
  </div>
</div>
</div>
@include('layouts.footer')
@include('process.users')