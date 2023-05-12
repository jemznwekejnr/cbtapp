@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Update Announcement</h5>
              </div>
              <div class="card-body">
                <form id="announcementupdate" action="updateannouncement" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Recipient</label> 
                        <select type="text" name="recipient" id="recipient" class="form-control" required>
                            <option>{{ $announcement[0]->recipient }}</option>
                            <option>All Participants</option>
                            <option>Individual Participants</option>
                            <option>All State Participants</option>
                            <option>Particular State Participants</option>
                            <option>All LGA Participants</option>
                            <option>Particular LGA Participants</option>
                            <option value="CSO">CSO Participants</option>
                            <option value="NGO">NGO Participants</option>
                            <option value="BDSP">BDSP Participants</option>
                            <option value="CBO">CBO Participants</option>
                            <option value="Advertisers">Advertisers</option>
                            <option value="Sponsors">Sponsors</option>
                            <option value="Staff">Staff</option>
                        </select>
                      </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $announcement[0]->id }}">
                    <div class="col-md-4 px-1">
                    @if($announcement[0]->recipient == 'Individual Participants')
                      <div class="form-group">
                        <label>Participant E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" value="{{ $announcement[0]->recipient }}">
                      </div>
                      @elseif($announcement[0]->recipient == 'Particular State Participants')
                      <div class="form-group">
                        <label>State</label>
                        <select name="states" id="states" class="form-control">
                            <option>{{ $announcement[0]->recipient }}</option>
                            @foreach(App\Http\Controllers\Controller::states() as $state)
                                <option>{{ $state }}</option>
                            @endforeach
                        </select>
                      </div>
                      @endif
                    </div>
                    <div class="col-md-3 pl-1">
                     @if($announcement[0]->recipient == 'Particular LGA Participants')
                      <div class="form-group">
                        <label>LGA</label>
                        <select name="lgas" id="lgas" class="form-control">
                            <option>{{ $announcement[0]->recipient }}</option>
                        </select>
                      </div>
                      @endif
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title of Announcement" required value="{{ $announcement[0]->title }}">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="body" id="body" placeholder="Message Body" required>{{ $announcement[0]->message }}</textarea>
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
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Commence Date</label>
                        <input type="date" name="commencedate" id="commencedate" class="form-control" value="{{ $announcement[0]->created_at }}" required>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Expire Date</label>
                        <input type="date" name="expiredate" id="expiredate" class="form-control" value="{{ $announcement[0]->updated_at }}">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Status</label>
                        <select type="date" name="status" id="status" class="form-control">
                            <option>{{ $announcement[0]->status }}</option>
                            <option>Expired</option>
                            <option>Active</option>
                            @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Previous Announcements', 'Delete') == 'allow')
                            <option>Delete</option>
                            @endif
                            </select>
                      </div>
                    </div>
                    @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Previous Announcements', 'Edit') == 'allow')
                    <div class="col-md-3 pl-1">
                      <div class="form-group float-right">
                        
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update">
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