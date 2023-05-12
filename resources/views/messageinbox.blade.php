@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-5">
                        <h5 class="title">Message Inbox</h5>
                    </div>
                    <div class="col-md-7 float-right">
                        {!! $messages->links() !!}
                    </div>
                </div>
              </div>
              @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Message Inbox', 'View') == 'allow')
              <div class="card-body">
                @foreach($messages as $message)
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="alert alert-info">
                            <h6><a href="{{ url('emaildetails?id='.$message->id) }}" style="color: white;">{{ $message->title }}</a></h6>
                            <p>Sent By: @php echo App\Http\Controllers\Controller::getusername($message->sender) @endphp | Date: {{ $message->created_at }}</p>
                        </div>
                      </div>
                    </div>
                @endforeach
               {!! $messages->links() !!}
              </div>
              @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Message Inbox', 'View') == 'allow')
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
      
@include('layouts.footer')
@include('process.payments')