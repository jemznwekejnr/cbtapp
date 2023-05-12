@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Variation Reports</h5>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Months</th>
      <th>Members</th>
      <th>Savings Account (&#8358;)</th>
      <th>Normal Loan Repayment (&#8358;)</th>
      <th>Soft Loan Repqyment (&#8358;)</th>
      <th>Shop Repayment (&#8358;)</th>
      <th>Business Repayment (&#8358;)</th>
      <th>Total</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Months</th>
      <th>Members</th>
      <th>Savings Account (&#8358;)</th>
      <th>Normal Loan Repayment (&#8358;)</th>
      <th>Soft Loan Repqyment (&#8358;)</th>
      <th>Shop Repayment (&#8358;)</th>
      <th>Business Repayment (&#8358;)</th>
      <th>Total</th>
      <th class="disabled-sorting text-right">Actions</th>
    </tr>
  </tfoot>
  <tbody>
    @isset($variations)
    @foreach($variations as $variation)

    <tr>
      <td>{{ $variation->month }}</td>
      <td>@php echo App\Http\Controllers\Controller::memberscount($variation->month); @endphp</td>
      <td>@php echo number_format(App\Http\Controllers\Controller::savingssums($variation->month), 2); @endphp</td>
      <td>@php echo number_format(App\Http\Controllers\Controller::normalloansums($variation->month), 2); @endphp</td>
      <td>@php echo number_format(App\Http\Controllers\Controller::softloansums($variation->month), 2); @endphp</td>
      <td>@php echo number_format(App\Http\Controllers\Controller::shoprepaymentsums($variation->month), 2); @endphp</td>
      <td>@php echo number_format(App\Http\Controllers\Controller::businessrepaymentsums($variation->month), 2); @endphp</td>
      <td>@php echo number_format(App\Http\Controllers\Controller::totalsums($variation->month), 2); @endphp</td>
      <td class="text-right">
        <a href="{{ url('variationdetails/?month='.$variation->month) }}" class="btn btn-round btn-warning btn-icon btn-sm"><i class="far fa-calendar-alt"></i></a>
      </td>
    </tr>

    @endforeach
    @endisset
    
  </tbody>
</table>
<div class="row">
  <div class="col-md-3">
    <strong>Total Records: {{ $total }}</strong>
  </div>
</div>
</div>
    </div>
  </div>
</div>
</div>
@include('layouts.footer')
@include('process.users')