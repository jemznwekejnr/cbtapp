@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="title">Participant Registration Details</h5>
                    </div>
                    <div class="col-md-5">
                        <h5 class="title" style="text-align:right;"></h5>
                    </div>
                </div>
              </div>
              
              <div class="card-body">
                
                <form id="manageparticipant" action="updateparticipant" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Title</label>
                        <select name="title" id="title" class="form-control" required>
                            <option>{{ $user[0]->title }}</option>
                            <option>Mr</option>
                            <option>Mrs</option>
                            <option>Miss</option>
                            <option>Dr</option>
                            <option>Chief</option>
                            <option>Hon</option>
                        </select>
                        
                      </div>
                    </div>
                    <div class="col-md-7 px-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Staff name in full" value="{{ $user[0]->name }}" required>
                        <input type="hidden" name="id" id="id" value="{{ $user[0]->id }}">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" maxlength="11" onkeypress="return isNumberKey(event)" value="{{ $user[0]->phone }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" value="{{ $user[0]->email }}" required>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook Account" value="{{ $user[0]->facebook }}" >
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>WhatsApp</label>
                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" maxlength="11" placeholder="WhatsApp No" onkeypress="return isNumberKey(event)" value="{{ $user[0]->whatsapp }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Twitter Handle" value="{{ $user[0]->twitter }}" >
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Instagram Handle" value="{{ $user[0]->instagram }}" >
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Participation Type</label>
                  <select name="participant" id="participant" class="form-control" required>
                      <option>{{ $user[0]->membertype }}</option>
                      <option>LGA</option>
                      <option>State</option>
                      <option>BDSP</option>
                      <option>CSO</option>
                      <option>NGO</option>
                      <option>CBO</option>
                      <option>Advertiser</option>
                      <option>Sponsor</option>
                      <option>Staff</option>
                  </select>
                      </div>
                    </div>
                  </div>
                  @if($user[0]->membertype == 'State' || $user[0]->membertype == 'LGA')
                  <div class="row content">
                  <div class="col-lg-3 pr-1">
                      <div class="form-group">
                          <label>Geopolitical  Zone</label>
                          <select name="geozone" id="geozone" class="form-control">
                              <option>{{ $user[0]->zone }}</option>
                              @foreach(App\Http\Controllers\Controller::FetchZones() as $location)
                              <option>{{ $location->zone }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-3 px-1">
                      <div class="form-group">
                          <label>State</label>
                          <select name="states" id="states" class="form-control">
                              <option>{{ $user[0]->state }}</option>
                          </select>
                      </div>
                  </div>
                   @if($user[0]->membertype == 'LGA')
                  <div class="col-lg-3 px-1">
                      <div class="form-group">
                          <label>Local Government</label>
                          <select name="lgas" id="lgas" class="form-control">
                              <option>{{ $user[0]->lga }}</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-3 pl-1">
                      <div class="form-group">
                          <label>Council Ward</label>
                          <select name="wards" id="wards" class="form-control">
                              <option>{{ $user[0]->ward }}</option>
                          </select>
                      </div>
                  </div>
                  @endif
                 </div>
                 @endif
                 <div class="row content">
                  <div class="col-lg-3 pr-1">
                      <div class="form-group">
                          <label>Gender</label>
                          <select name="gender" id="gender" class="form-control">
                              <option>{{ $user[0]->gender }}</option>
                              <option>Male</option>
                              <option>Female</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-3 px-1">
                      <div class="form-group">
                          <label>Work Place</label>
                          <select name="work" id="work" class="form-control">
                              <option>{{ $user[0]->workplace }}</option>
                              <option>Executive</option>
                              <option>Legislative</option>
                              <option>Bureaucracy</option>
                              <option>CSO</option>
                              <option>BDSP</option>
                              <option>NGO</option>
                              <option>CBO</option>
                              <option>Others</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-3 px-1">
                      <div class="form-group">
                          <label>Role</label>
                          <select name="role" id="role" class="form-control">
                              <option value="{{ $user[0]->role }}">@php echo App\Http\Controllers\Controller::getrolename($user[0]->role) @endphp</option>
                              @foreach(App\Http\Controllers\Controller::fetchroles() as $role)
                              <option value="{{ $role->id }}">{{ $role->role }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-3 pl-1">
                      <div class="form-group">
                        <label>Status</label>
                          <select name="status" id="status" class="form-control">
                              <option>{{ $user[0]->status }}</option>
                              <option>Active</option>
                              <option>Suspend</option>
                              @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Participants', 'Delete') == 'allow')
                              <option>Delete</option>
                              @endif
                          </select>
                      </div>
                  </div>
                 </div>
                 <div class="row content">
                  <div class="col-lg-3 pr-1">
                      <div class="form-group">
                          <label>Created By</label>
                          <p name="createdby" id="createdby" class="form-control">@php echo App\Http\Controllers\Controller::getusername($user[0]->created_by) @endphp
                          </p>
                      </div>
                  </div>
                  <div class="col-lg-3 px-1">
                      <div class="form-group">
                          <label>Created At</label>
                          <p name="createdat" id="createdat" class="form-control">{{ $user[0]->created_at }}
                          </p>
                      </div>
                  </div>
                  <div class="col-lg-3 px-1">
                      <div class="form-group">
                          <label>Last Modified By</label>
                            <p class="form-control">@php echo App\Http\Controllers\Controller::getusername($user[0]->updated_by) @endphp</p>
                      </div>
                  </div>
                  <div class="col-lg-3 pl-1">
                      <div class="form-group">
                          <label>Last Modified At</label>
                          <p class="form-control">{{ $user[0]->updated_at }}</p>
                      </div>
                  </div>
                 </div>
                 <div class="row content">
                  <div class="col-lg-4 pr-1">
                      <div class="form-group">
                          <label>Participant ID</label>
                          <p name="membershipid" id="membershipid" class="form-control">{{ $user[0]->membershipid }}
                          </p>
                      </div>
                  </div>
                  <div class="col-lg-2 px-1">
                      <div class="form-group">
                          
                      </div>
                  </div>
                  <div class="col-lg-3 px-1">
                      <div class="form-group">
                          
                      </div>
                  </div>
                  @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Participants', 'Edit') == 'allow')
                  <div class="col-lg-3 pl-1">
                      <div class="form-group float-right">
                          <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update Participant">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                      </div>
                  </div>
                  @endif
                 </div>
                 <div class="row content">
                  <div class="col-lg-12">
                      <div class="form-group">
                        <div class="alert " id="message"></div>
                      </div>
                  </div>
                 </div>
                  
                  
                  <div class="row">
                    <div class="col-md-4">
                      
                    
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        
                        
                        
                      </div>
                    </div>
                  </div>
                  
                </form>

               
              </div>
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
      
@include('layouts.footer')
@include('process.payments')