@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="title">Participant Registration</h5>
                    </div>
                    <div class="col-md-5">
                        <h5 class="title" style="text-align:right;">@php echo App\Http\Controllers\Controller::remainingreg() @endphp Registration Left</h5>
                    </div>
                </div>
              </div>
              
              <div class="card-body">
                @if(App\Http\Controllers\Controller::remainingreg() > 0)
                <form id="createparticipant" action="submitparticipant" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Title</label>
                        <select name="title" id="title" class="form-control" required>
                            <option value="">Select</option>
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
                        <input type="text" name="name" id="name" class="form-control" placeholder="Staff name in full" value="" required>
                        <input type="hidden" name="id" id="id">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" maxlength="11" onkeypress="return isNumberKey(event)" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" value="" required>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook Account" value="" >
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>WhatsApp</label>
                        <input type="text" name="whatsapp" id="whatsapp" class="form-control" maxlength="11" placeholder="WhatsApp No" onkeypress="return isNumberKey(event)">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Twitter Handle" value="" >
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Instagram Handle" value="" >
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Participation Type</label>
                  <select name="participant" id="participant" class="form-control" required>
                      <option value="">Select Participation</option>
                      <option>LGA</option>
                      <option>State</option>
                      <option>BDSP</option>
                      <option>CSO</option>
                      <option>NGO</option>
                      <option>CBO</option>
                      <option>Advertiser</option>
                      <option>Sponsor</option>
                  </select>
                      </div>
                    </div>
                  </div>
                  <div class="row content" id="location">
                  <div class="col-lg-3 pr-1">
                      <div class="form-group">
                          <label>Geopolitical  Zone</label>
                          <select name="geozone" id="geozone" class="form-control">
                              <option value="">Select Zone</option>
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
                              <option value="">Select State</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-3 px-1" id="lga">
                      <div class="form-group">
                          <label>Local Government</label>
                          <select name="lgas" id="lgas" class="form-control">
                              <option value="">Select LGA</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-3 pl-1" id="ward">
                      <div class="form-group">
                          <label>Council Ward</label>
                          <select name="wards" id="wards" class="form-control">
                              <option value="">Select Ward</option>
                          </select>
                      </div>
                  </div>
                 </div>
                 <div class="row content">
                  <div class="col-lg-3 pr-1">
                      <div class="form-group">
                          <label>Gender</label>
                          <select name="gender" id="gender" class="form-control">
                              <option value="">Select Gender</option>
                              <option>Male</option>
                              <option>Female</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-3 px-1">
                      <div class="form-group">
                          <label>Work Place</label>
                          <select name="work" id="work" class="form-control">
                              <option value="">Select Work Place</option>
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
                          <label>Specify Ward</label>
                          <input type="text" name="specifyward" id="specifyward" class="form-control" placeholder="Specify Ward">
                      </div>
                  </div>
                  @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'My Participants', 'Create') == 'allow')
                  <div class="col-lg-3 pl-1">
                      <div class="form-group float-right">
                          <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Create Participant">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                      </div>
                  </div>
                  @endif
                 </div>
                 <div class="row content">
                  <div class="col-lg-12">
                      <div class="form-group">
                        <div class="" id="messaging"></div>
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
                @endif
                @include('process.myparticipants')

               
              </div>
            </div>
          </div>
          
        </div>
      </div>
      
@include('layouts.footer')
@include('process.payments')