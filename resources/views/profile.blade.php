@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">User Profile</h5>
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
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Participant ID</label>
                        <p class="form-control" id="membershipid">{{ Auth::user()->membershipid }}</p>
                      </div>
                    </div>
                    <div class="col-md-7 pl-1">
                      <div class="form-group">
                        <label>Name</label>
                        <p class="form-control" >{{ Auth::user()->title }} {{ Auth::user()->name }}</p>
                      </div>
                    </div>
                  </div>
                  <div id="modal"></div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <p class="form-control">{{ Auth::user()->email }}</p>
                      </div>
                    </div>
                    <div class="col-md-5 pl-1">
                      <div class="form-group">
                        <label>Mobile Phone Number</label>
                        <p class="form-control" >{{ Auth::user()->phone }}</p>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>WhatsApp Number</label>
                        <p class="form-control" >{{ Auth::user()->whatsapp }}</p>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Instagram Handle</label>
                        <p class="form-control" >{{ Auth::user()->instagram }}</p>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Twitter Handle</label>
                        <p class="form-control" >{{ Auth::user()->twitter }}</p>
                      </div>
                    </div> 
                    
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Facebook Account</label>
                        <p class="form-control" >{{ Auth::user()->facebook }}</p>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Gender</label>
                        <p class="form-control" >{{ Auth::user()->gender }}</p>
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
                        <p class="form-control" >{{ Auth::user()->workplace }}</p>
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
                    <div class="col-md-4">
                      
                    
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        @isset($initialmessage)
                        @if($initialmessage != 'Please contact admin to activate your account.')
                        <a href="{{ url('editprofile') }}"><input type="button" class="btn btn-round btn-warning" value="Update Profile"></a>
                        @endif
                        @endisset
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