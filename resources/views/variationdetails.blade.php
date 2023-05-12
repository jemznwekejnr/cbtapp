@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <h5 class="title">Variation Report as at {{ $month }}</h5>
            </div>
            <div class="col-md-4 float-right">
                <a href="exportvariation?month={{ $month }}"><button type="button" class="btn btn-round btn-info" id="exports">Export Variation</button></a>
                <input type="hidden" id="month" value="{{ $month }}">
                <img src="{{ asset('assets/img/processing.gif') }}" class="processing">
            </div>
            <div class="alert" id="message"></div>
        </div>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
    <tr>
      <th>SN</th>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Savings Account</th>
      <th>Normal Loan Repayment</th>
      <th>Soft Loan Repayment</th>
      <th>Shop</th>
      <th>Business</th>
      <th>Total</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>SN</th>
      <th>IPPIS Number</th>
      <th>Name</th>
      <th>Savings Account</th>
      <th>Normal Loan Repayment</th>
      <th>Soft Loan Repayment</th>
      <th>Shop</th>
      <th>Business</th>
      <th>Total</th>
    </tr>
  </tfoot>
  <tbody>
    @php $x=1 @endphp
    @isset($variations)
    @foreach($variations as $user)
    <tr>
      <td>{{ $x++ }}</td>
      <td>{{ $user->ippisnumber }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ number_format($user->savings, 2) }}</td>
      <td>{{ number_format($user->normalloan, 2) }}</td>
      <td>{{ number_format($user->softloan, 2) }}</td>
      <td>{{ number_format($user->shop, 2) }}</td>
      <td>{{ number_format($user->business, 2) }}</td>
      <td>{{ number_format($user->total, 2) }}</td>
    </tr>
    @endforeach
    <tr>
      <td><strong>Total</strong></td>
      <td><strong>{{ number_format($user->ippisnumber, 2) }}</strong></td>
      <td><strong>{{ $total }}</strong></td>
      <td><strong>{{ number_format($sumsavings, 2) }}</strong></td>
      <td><strong>{{ number_format($sumnormalloan, 2) }}</strong></td>
      <td><strong>{{ number_format($sumsoftloan, 2) }}</strong></td>
      <td><strong>{{ number_format($sumshop, 2) }}</strong></td>
      <td><strong>{{ number_format($sumbusiness, 2) }}</strong></td>
      <td><strong>{{ number_format($sumtotal, 2) }}</strong></td>
    </tr>
    @endisset
    
  </tbody>
</table>
@isset($total)
<strong>Total Records: {{ $total }}</strong>
@endisset
</div>
    </div>
  </div>
</div>
</div>
@include('layouts.footer')
@include('process.variation')