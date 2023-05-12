@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-5">
                        <h5 class="title">Sent Messages</h5>
                    </div>
                    <div class="col-md-7 float-right">
                        {!! $messages->links() !!}
                    </div>
                </div>
              </div>
              @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Sent Messages', 'View') == 'allow')
              <div class="card-body">
                @foreach($messages as $message)
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="alert alert-warning">
                            <h6><a href="{{ url('emaildetails?id='.$message->id) }}" style="color: white;">{{ $message->title }}</a></h6>
                            <p>Sent To: {{ $message->recipient }} | Date: {{ $message->created_at }}</p>
                        </div>
                      </div>
                    </div>
                @endforeach
               {!! $messages->links() !!}
              </div>
              @endif
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
      
@include('layouts.footer')
@include('process.payments')