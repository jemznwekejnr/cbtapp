@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Participant Payment Records</h5>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Payment Date</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Participation Type</th>
      <th>No of Participants</th>
      <th>Total Amount Paid (&#8358;)</th>
      <th>Payment Method</th>
      <th>Payment Status</th>
      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Payments', 'Edit') == 'allow')
      <th class="disabled-sorting text-right">Actions</th>
      @endif
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Payment Date</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Participation Type</th>
      <th>No of Participants</th>
      <th>Total Amount Paid (&#8358;)</th>
      <th>Payment Method</th>
      <th>Payment Status</th>
      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Payments', 'Edit') == 'allow')
      <th class="disabled-sorting text-right">Actions</th>
      @endif
    </tr>
  </tfoot>
  <tbody>
    @isset($payments)
    @foreach($payments as $payment)

    <tr>
      <td>{{ $payment->created_at }}</td>
      <td>{{ $payment->name }}</td>
      <td>{{ $payment->email }}</td>
      <td>{{ $payment->phone }}</td>
      <td>{{ $payment->participationtype }}</td>
      <td>{{ $payment->totalparticipant }}</td>
      <td>&#8358;{{ number_format($payment->amountpaid, 2) }}</td>
      <td>{{ $payment->paymentmethod }}</td>
      <td>{{ $payment->paymentstatus }}</td>
      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Payments', 'Edit') == 'allow')
      <td class="text-right">
        <a href="{{ url('paymentdetails/?payment='.$payment->id) }}" class="btn btn-round btn-warning btn-icon btn-sm"><i class="far fa-calendar-alt"></i></a>
      </td>
      @endif
    </tr>

    @endforeach
    @endisset
    
  </tbody>
</table>
<div class="row">
  <div class="col-md-3">
    <strong>Total Participants: {{ $participants }}</strong>
  </div>
  <div class="col-md-3">
    <strong>Total Payments: &#8358;{{ number_format($totalpayments, 2) }}</strong>
  </div>
  <div class="col-md-3">
    <strong>{!! $payments !!}</strong>
  </div>
</div>

</div>
    </div>
  </div>
</div>
</div>
@include('layouts.footer')
@include('process.users')