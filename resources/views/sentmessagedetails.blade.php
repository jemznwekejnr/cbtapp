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
                    </div>
                </div>
              </div>
              
              <div class="card-body">
                @foreach($messages as $message)
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="">
                            <h5>{{ $message->title }}</h5>
                            <small>Sent To: {{ $message->recipient }} | Date: {{ $message->created_at }}</small><br /><br />
                            <p>{{ $message->message }}</p>
                            @if(!empty($message->attachment))
                            <p><a href="{{ url($message->attachment) }}"><button class="btn btn-round btn-info">View Attachment</button></a></p>
                            @endif
                        </div>
                      </div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
      
@include('layouts.footer')
@include('process.payments')