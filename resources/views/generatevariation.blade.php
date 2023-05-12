@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
            <div class="alert" id="message"></div>
        <div class="row">
            <div class="col-md-8">
                <h5 class="title">Variation Generation Report as at {{ date('F, Y') }}</h5>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-round btn-warning" id="save">Save Variation</button>
                <a href="exportvariation?month={{ date('Y-m') }}"><button type="button" class="btn btn-round btn-info" id="exports">Export Variation</button></a>
                <img src="{{ asset('assets/img/processing.gif') }}" class="processing">
                <input type="hidden" id="checkvariation" value="{{ $checkvariation }}">
                <input type="hidden" id="month" value="{{ date('Y-m') }}">
            </div>
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
    @isset($nonmembers)
    @foreach($nonmembers as $user)
    <tr>
      <td>{{ $x++ }}</td>
      <td>{{ $user->ippisnumber }}</td>
      <td>{{ $user->name }}</td>
      <td></td>
      <td></td>
      <td></td>
      <td>{{ $user->monthlyamount }}</td>
      <td></td>
      <td>{{ $user->monthlyamount }}</td>
    </tr>
    @endforeach
    @endisset
    
    @isset($users)
    @foreach($users as $user)
    <tr>
      <td>{{ $x++ }}</td>
      <td>{{ $user->ippisnumber }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->cooperativeamount }}</td>
      <td>@php echo app\http\Controllers\Controller::variationnormalloan($user->ippisnumber) @endphp</td>
      <td>@php echo app\http\Controllers\Controller::variationsoftloan($user->ippisnumber) @endphp</td>
      <td>@php echo app\http\Controllers\Controller::variationshop($user->ippisnumber) @endphp</td>
      <td>@php echo app\http\Controllers\Controller::variationbusiness($user->ippisnumber) @endphp</td>
      <td>@php echo app\http\Controllers\Controller::totalvariation($user->ippisnumber) @endphp</td>
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
@include('process.variation')