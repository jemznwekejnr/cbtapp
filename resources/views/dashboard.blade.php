@include('layouts.extension')
<div class="content">
        <div class="row">
          <div class="col-md-12">
              
            @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Dashboard Statistics', 'View') == 'allow')
            <div class="card card-stats">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-primary">
                          <i class="now-ui-icons business_bank"></i>
                        </div>
                        <h3 class="info-title">@php echo App\Http\Controllers\Controller::stateparticipants(); @endphp</h3>
                        <h6 class="stats-title">State Participants</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-success">
                          <i class="now-ui-icons design_bullet-list-67"></i>
                        </div>
                        <h3 class="info-title">@php echo App\Http\Controllers\Controller::lgaparticipants(); @endphp</h3>
                        <h6 class="stats-title">LGA Participants</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-info">
                          <i class="now-ui-icons business_briefcase-24"></i>
                        </div>
                        <h3 class="info-title">@php echo App\Http\Controllers\Controller::csoparticipants(); @endphp</h3>
                        <h6 class="stats-title">CSO Participants</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-warning">
                          <i class="now-ui-icons files_single-copy-04"></i>
                        </div>
                        <h3 class="info-title">@php echo App\Http\Controllers\Controller::bdspparticipants(); @endphp</h3>
                        <h6 class="stats-title">BDSP Participants</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-primary">
                          <i class="now-ui-icons business_badge"></i>
                        </div>
                        <h3 class="info-title">@php echo App\Http\Controllers\Controller::ngoparticipants(); @endphp</h3>
                        <h6 class="stats-title">NGO Participants</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-success">
                          <i class="now-ui-icons design_image"></i>
                        </div>
                        <h3 class="info-title">@php echo App\Http\Controllers\Controller::cboparticipants(); @endphp</h3>
                        <h6 class="stats-title">CBO Participants</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-info">
                          <i class="now-ui-icons business_chart-pie-36"></i>
                        </div>
                        <h3 class="info-title">@php echo App\Http\Controllers\Controller::advertiserparticipants(); @endphp</h3>
                        <h6 class="stats-title">Advertisers</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="statistics">
                      <div class="info">
                        <div class="icon icon-warning">
                          <i class="now-ui-icons business_money-coins"></i>
                        </div>
                        <h3 class="info-title">@php echo App\Http\Controllers\Controller::sponsorparticipants(); @endphp</h3>
                        <h6 class="stats-title">Sponsors</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                @endif
          </div>
        </div>
        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Notice Board', 'View') == 'allow')
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><strong>Notice Board</strong></h4>
              </div>
              <div class="card-body">
                @foreach(App\Http\Controllers\Controller::dashboardannouncements() as $announcement)
                @if($announcement->status == 'Active')
                    
                        
                    <div class="alert alert-info">
                        <h5><strong><a href="{{ url('updateannouncements?id='.$announcement->id) }}" style="color: white;">{{ $announcement->title }}</a></strong></h5>
                        <p><strong>{{ $announcement->message }}</strong></p>
                        <p>Posted On: {{ $announcement->created_at }} | Status: {{ $announcement->status }} | Expiry Date: {{ $announcement->updated_at }} </p>
                    </div>
                     
                @else
                
                    <div class="alert alert-warning">
                        <h5><strong><a href="{{ url('updateannouncements?id='.$announcement->id) }}" style="color: white;">{{ $announcement->title }}</a></strong></h5>
                        <p><strong>{{ $announcement->message }}</strong></p>
                        <p>Posted On: {{ $announcement->created_at }} | Status: {{ $announcement->status }} | Expiry Date: {{ $announcement->updated_at }} </p>
                    </div>
                      
                @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
        @endif
        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Unconfirmed Payments', 'View') == 'allow')
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><strong>Unconfirmed Payments</strong></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-shopping">
                    <thead class="">
                      <th>Date</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Total Participants</th>
                      <th>Amount Paid</th>
                      <th>Participant Type</th>
                      <th class="disabled-sorting text-right">Action</th>
                    </thead>
                    <tbody>
                      @foreach(App\Http\Controllers\Controller::pendingpayments() as $payment)
                      <tr>
                        <td>{{ $payment->created_at }}</td>
                        <td>{{ $payment->name }}</td>
                        <td>{{ $payment->email }}</td>
                        <td>{{ $payment->phone }}</td>
                        <td>{{ $payment->totalparticipant }}</td>
                        <td>{{ $payment->amountpaid }}</td>
                        <td>{{ $payment->participationtype }}</td>
                        <td class="text-right">
                            <a href="{{ url('paymentdetails/?payment='.$payment->id) }}" class="btn btn-round btn-warning btn-icon btn-sm"><i class="far fa-calendar-alt"></i></a>
                            </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
@include('layouts.footer')