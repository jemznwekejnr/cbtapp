@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Business Finance Request View</h5>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>IPPIS</th>
      <th>Name</th>
      <th>Total Savings (&#8358;)</th>
      <th>Savings Period (Month)</th>
      <th>Withdrawal Amount</th>
      <th>Comment</th>
      <th>Status</th>
      <th>Date Created</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>IPPIS</th>
      <th>Name</th>
      <th>Total Savings (&#8358;)</th>
      <th>Savings Period (Month)</th>
      <th>Withdrawal Amount</th>
      <th>Comment</th>
      <th>Status</th>
      <th>Date Created</th>
    </tr>
  </tfoot>
  <tbody>
    @isset($withdraws)
    @foreach($withdraws as $withdraw)

    <tr>
      <td>{{ $withdraw->ippisnumber }}</td>
      <td>{{ $withdraw->name }}</td>
      <td>{{ number_format($withdraw->totalsaved, 2) }}</td>
      <td>{{ $withdraw->monthssaved }}</td>
      <td>{{ $withdraw->withdrawamount }}</td>
      <td>{{ $withdraw->comment }}</td>
      <td>{{ $withdraw->withdrawstatus }}</td>
      <td>{{ $withdraw->created_at }}</td>
    </tr>

    @endforeach
    @endisset
    
  </tbody>
</table>
<div class="row">
  <div class="col-md-3">
    <strong>Total Withdrawal: &#8358;{{ number_format($total, 2) }}</strong>
  </div>
  <div class="col-md-3">
    
  </div>
</div>

</div>
    </div>
  </div>
</div>
</div>
@include('layouts.footer')