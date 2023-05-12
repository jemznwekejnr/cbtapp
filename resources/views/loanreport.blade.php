@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Loan Request View</h5>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Loan Type</th>
      <th>Requested Amount (&#8358;)</th>
      <th>Duration</th>
      <th>Loan Status</th>
      <th>Total Repaid (&#8358;)</th>
      <th>Months Completed</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Loan Type</th>
      <th>Requested Amount (&#8358;)</th>
      <th>Duration</th>
      <th>Loan Status</th>
      <th>Total Repaid (&#8358;)</th>
      <th>Months Completed</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </tfoot>
  <tbody>
    @isset($loans)
    @foreach($loans as $loan)

    <tr>
      <td>{{ $loan->ippisnumber }}</td>
      <td>{{ $loan->name }}</td>
      <td>@php echo App\Http\Controllers\Controller::getloanname($loan->loantype); @endphp</td>
      <td>&#8358;{{ number_format($loan->requestedamount, 2) }}</td>
      <td>{{ $loan->duration }}</td>
      <td>{{ $loan->status }}</td>
      <td>&#8358;{{ number_format($loan->totalrepay, 2) }}</td>
      <td>{{ $loan->monthscompleted }}</td>
      <td class="text-right">
        <a href="{{ url('loandetails/?loan='.$loan->id) }}" class="btn btn-round btn-warning btn-icon btn-sm"><i class="far fa-calendar-alt"></i></a>
      </td>
    </tr>

    @endforeach
    @endisset
    
  </tbody>
</table>
<div class="row">
  <div class="col-md-3">
    <strong>Total Request: &#8358;{{ number_format($requestedamount, 2) }}</strong>
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