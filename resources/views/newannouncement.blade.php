@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Post Announcement</h5>
              </div>
              <div class="card-body">
                <form id="newannouncement" action="postannouncements" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Recipient</label>
                        <select type="text" name="recipient" id="recipient" class="form-control" required>
                            <option value="">Select Recipient</option>
                            <option>All Participants</option>
                            <option>Individual Participants</option>
                            <option>All State Participants</option>
                            <option>Particular State Participants</option>
                            <option>All LGA Participants</option>
                            <option>Particular LGA Participants</option>
                            <option>CSO Participants</option>
                            <option>NGO Participants</option>
                            <option>BDSP Participants</option>
                            <option>CBO Participants</option>
                            <option>Advertisers</option>
                            <option>Sponsors</option>
                            <option>Staff</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group" id="individual">
                        <label>Participant E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" value="">
                      </div>
                      <div class="form-group" id="state">
                        <label>State</label>
                        <select name="states" id="states" class="form-control">
                            @foreach(App\Http\Controllers\Controller::states() as $state)
                                <option>{{ $state }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group" id="lga">
                        <label>LGA</label>
                        <select name="lgas" id="lgas" class="form-control">
                            <option value="">Select LGA</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title of Announcement" required>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="body" id="body" placeholder="Message Body" required></textarea>
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
                  
                 
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Commence Date</label>
                        <input type="date" name="commencedate" id="commencedate" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Expire Date</label>
                        <input type="date" name="expiredate" id="expiredate" class="form-control">
                      </div>
                    </div>
                    @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Post Announcements', 'Create') == 'allow')
                    <div class="col-md-4 pl-1">
                      <div class="form-group float-right">
                        
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Publish Announcement">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                        
                      </div>
                    </div>
                    @endif
                  </div>
                  
                </form>

                

               
              </div>
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
@include('layouts.footer')
@include('process.users')