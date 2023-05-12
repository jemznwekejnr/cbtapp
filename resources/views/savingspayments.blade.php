@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Cooperative Savings Payments</h5>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <tr>
      <th>IPPIS No</th>
      <th>Name</th>
      <th>Amount (&#8358;)</th>
      <th>Month</th>
      <th>Payment Status</th>
      <th>Date Paid</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>IPPIS No</th>
      <th>Name</th>
      <th>Amount (&#8358;)</th>
      <th>Month</th>
      <th>Payment Status</th>
      <th>Date Paid</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </tfoot>
  <tbody>
    @isset($savings)
    @foreach($savings as $saving)

    <tr>
      <td>{{ $saving->ippisnumber }}</td>
      <td>{{ $saving->name }}</td>
      <td>{{ number_format($saving->amount, 2) }}</td>
      <td>{{ $saving->month }}</td>
      <td>{{ $saving->paymentstatus }}</td>
      <td>{{ $saving->created_at }}</td>
      <td class="text-right">
        <a href="{{ url('savingsdetails/?saving='.$saving->id) }}" class="btn btn-round btn-warning btn-icon btn-sm edit"><i class="far fa-calendar-alt"></i></a>
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