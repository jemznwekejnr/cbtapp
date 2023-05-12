@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Loan Repayment Report</h5>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <tr>
      <th>Loan ID</th>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Amount Paid</th>
      <th>Month</th>
      <th>Payment Status</th>
      <th>Date Paid</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Loan ID</th>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Amount Paid</th>
      <th>Month</th>
      <th>Payment Status</th>
      <th>Date Paid</th>
    </tr>
  </tfoot>
  <tbody>
    @isset($payments)
    @foreach($payments as $payment)

    <tr>
      <td>{{ $payment->loanid }}</td>
      <td>{{ $payment->ippisnumber }}</td>
      <td>{{ $payment->name }}</td>
      <td>{{ $payment->amount }}</td>
      <td>{{ $payment->month }}</td>
      <td>{{ $payment->paymentstatus }}</td>
      <td>{{ $payment->created_at }}</td>
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