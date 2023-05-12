@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Update Profile</h5>
              </div>
              <div class="card-body">
                <form id="updateprofile" action="profileupdate" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                @isset($initialmessage)
                @if($initialmessage != NULL)
                <center><div id="" class="alert alert-warning">{{ $initialmessage }}</div></center>
                @endif
                @endisset
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Participant ID</label>
                        <p class="form-control" id="membersid">{{ Auth::user()->membershipid }}</p>
                        <input type="hidden" name="membershipid" value="{{ Auth::user()->membershipid }}">
                        <input type="hidden" name="recordid" value="{{ Auth::user()->id }}">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Title</label>
                        <select name="title" id="title" class="form-control" required>
                            <option>{{ Auth::user()->title }}</option>
                            <option>Mr</option>
                            <option>Mrs</option>
                            <option>Miss</option>
                            <option>Dr</option>
                            <option>Chief</option>
                            <option>Hon</option>
                        </select>
                        
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your name in full" value="{{ Auth::user()->name }}" required>
                      </div>
                    </div>
                    
                  </div>
                  <div id="modal"></div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Mobile Phone Number</label>
                        <input type="text" name="phoneno" id="phoneno" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Provide your phone number" value="{{ Auth::user()->phone }}" minlength="11" maxlength="11" required>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>WhatsApp Number</label>
                        <input type="text" name="whatsapp" id="whatsapp" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Provide your phone number" value="{{ Auth::user()->whatsapp }}" minlength="11" maxlength="11">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Instagram Handle</label>
                        <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Provide your phone number" value="{{ Auth::user()->instagram }}" required>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Twitter Handle</label>
                        <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Twitter Handle" value="{{ Auth::user()->twitter }}" required>
                      </div>
                    </div> 
                    
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Facebook Account</label>
                        <input type="text" id="facebook" name="facebook" class="form-control" placeholder="Facebbok Account" value="{{ Auth::user()->facebook }}" required>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control" data-style="btn btn-round" required>
                        <option value="{{ !empty(Auth::user()->gender) ? Auth::user()->gender : '' }}">{{ !empty(Auth::user()->gender) ? Auth::user()->gender : 'Select Gender' }}</option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                    </div>
                  <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Participant Type</label>
                        <p class="form-control" >{{ Auth::user()->membertype }}</p>
                      </div>
                    </div>
                  </div>
                  @if(Auth::user()->membertype == 'LGA')
                  <div class="row">
                    
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Zone</label>
                        <p class="form-control" >{{ Auth::user()->zone }}</p>
                      </div>
                    </div>
                     <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>State</label>
                        <p class="form-control" >{{ Auth::user()->state }}</p>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>LGA</label>
                        <p class="form-control" >{{ Auth::user()->lga }}</p>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Ward</label>
                        <p class="form-control" >{{ Auth::user()->ward }}</p>
                      </div>
                    </div>
                  </div>
                  @elseif(Auth::user()->membertype == 'State')
                  <div class="row">
                    
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Zone</label>
                        <p class="form-control" >{{ Auth::user()->zone }}</p>
                      </div>
                    </div>
                     <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>State</label>
                        <p class="form-control" >{{ Auth::user()->state }}</p>
                      </div>
                    </div>
                    
                  </div>
                  @endif
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Work Place</label>
                        <select name="work" id="work" class="form-control">
                              <option>{{ Auth::user()->workplace }}</option>
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
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Role</label>
                        <p class="form-control" >@php echo App\Http\Controllers\Controller::getrolename(Auth::user()->role) @endphp</p>
                      </div>
                    </div>
                     
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Account Status</label>
                        <p class="form-control" >{{ Auth::user()->status }}</p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div id="message" class="alert"></div>
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
                        
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update Profile">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
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
@include('process.profile')