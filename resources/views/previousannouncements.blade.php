@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="title">Announcements</h5>
                    </div>
                    
                </div>
              </div>
              @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Previous Announcements', 'View') == 'allow')
              <div class="card-body">
                @foreach(App\Http\Controllers\Controller::announcements() as $announcement)
                @if($announcement->status == 'Active')
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="alert alert-info">
                            <h5><strong><a href="{{ url('updateannouncements?id='.$announcement->id) }}" style="color: white;">{{ $announcement->title }}</a></strong></h5>
                            <p><strong>{{ $announcement->message }}</strong></p>
                            <p>Posted On: {{ $announcement->created_at }} | Status: {{ $announcement->status }} | Expiry Date: {{ $announcement->updated_at }} </p>
                        </div>
                      </div>
                    </div>
                @else
                <div class="col-md-12">
                      <div class="form-group">
                        <div class="alert alert-warning">
                            <h5><strong><a href="{{ url('updateannouncements?id='.$announcement->id) }}" style="color: white;">{{ $announcement->title }}</a></strong></h5>
                            <p><strong>{{ $announcement->message }}</strong></p>
                            <p>Posted On: {{ $announcement->created_at }} | Status: {{ $announcement->status }} | Expiry Date: {{ $announcement->updated_at }} </p>
                        </div>
                      </div>
                    </div>
                @endif
                @endforeach
               
              </div>
              @endif
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
      
@include('layouts.footer')
@include('process.payments')