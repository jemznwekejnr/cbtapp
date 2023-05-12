@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Loan Types</h5>
              </div>
              <div class="card-body">
                <form id="loantype" action="newloantype" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Loan Type</label>
                        <input type="text" name="loantype" id="loantypes" class="form-control" placeholder="Loan Type" required>
                        <input type="hidden" name="id" id="id">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Admin Fee (%)</label>
                        <select class="form-control selectpicker" required name="adminfee" id="adminfee" data-style="btn-round">
                          <option value>Select</option>
                          @for($i=1; $i<=100; $i++)
                          <option>{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Allowed Amount (%)</label>
                        <select class="form-control selectpicker" required name="allowedamount" id="allowedamount" data-style="btn-round">
                          <option value="">Select</option>
                          @for($i=1; $i<=200; $i++)
                          <option>{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Max Duration (Months)</label>
                        <select class="form-control selectpicker" name="maxduration" id="maxduration" required data-style="btn-round">
                          <option value="">Select</option>
                          @for($i=1; $i<=60; $i++)
                          <option>{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </div>
                  

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <p id="message" class="alert"></p>
                      </div>
                    </div>
                  </div>
                  @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Define Loan Types', 'Create') == 'allow')
                  <div class="row">
                    <div class="col-md-4">
                      
                    
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group float-right">
                        
                        <input type="submit" id="button" class="btn btn-round btn-info" value="Create New Loan Type">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                        
                      </div>
                    </div>
                  </div>
                  @endif
                  
                </form>

  <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Loan Type</th>
      <th>Admin Fee(%)</th>
      <th>Savings Allowed (%)</th>
      <th>Max Duration (Months)</th>
      <th>Created By</th>
      <th>Created On</th>
      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Define Loan Types', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Define Loan Types', 'Delete') == 'allow')
      <th class="disabled-sorting text-right">Actions</th>
      @endif
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Loan Type</th>
      <th>Admin Fee(%)</th>
      <th>Savings Allowed (%)</th>
      <th>Max Duration (Months)</th>
      <th>Created By</th>
      <th>Created On</th>
      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Define Loan Types', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Define Loan Types', 'Delete') == 'allow')
      <th class="disabled-sorting text-right">Actions</th>
      @endif
    </tr>
  </tfoot>
  <tbody>
    @isset($loantypes)
    @foreach($loantypes as $loantype)
    <tr>
      <td>{{ $loantype->loantype }}</td>
      <td>{{ $loantype->adminfee_per }}</td>
      <td>{{ $loantype->maximumallowed_per }}</td>
      <td>{{ $loantype->maximumduration_months }}</td>
      <td>@php echo App\Http\Controllers\Controller::getusername($loantype->managed_by) @endphp</td>
      <td>{{ $loantype->created_at }}</td>
      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Define Loan Types', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Define Loan Types', 'Delete') == 'allow')
      <td class="text-right">
        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Define Loan Types', 'Edit') == 'allow')
        <a href="{{ $loantype->id }}" class="btn btn-round btn-warning btn-icon btn-sm edit"><i class="far fa-calendar-alt"></i></a>
        @endif
        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Define Loan Types', 'Delete') == 'allow')
        <a href="{{ $loantype->id }}" class="btn btn-round btn-danger btn-icon btn-sm remove"><i class="fas fa-times"></i></a>
        @endif
      </td>
      @endif
    </tr>

    @endforeach
    @endisset
    
  </tbody>
</table>
              </div>
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
@include('layouts.footer')
@include('process.loans')