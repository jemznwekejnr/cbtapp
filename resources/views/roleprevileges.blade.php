@include('layouts.extension')

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-5">
                    <h4 class="card-title">Manage Role Privileges</h4>
                  </div> 
                </div>
              </div>
              <hr />
              <div class="card-body">
                <div class="row">
                <div class="col-md-3">
                  <div class="card ">
                    <div class="card-header ">
                      
                          <h4 class="card-title">Existing Roles</h4>
                      
                    </div>
                    <div class="card-body ">
                    <form id="privilege" action="{{ url('submitprivilege') }}" method="post">
                    @csrf
                    @isset($setrole)
                    @isset($roles)
                    @foreach($roles as $role)
                    <div class="form-check form-check-radio form-group">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="role" id="role{{ $role->id }}" value="{{ $role->id }}" @if($role->id == $setrole) checked @endif>
                          <span class="form-check-sign"></span>
                          {{ $role->role }}
                        </label>
                      </div>
                      @endforeach
                      @endisset
                    @else
                    @isset($roles)
                    @foreach($roles as $role)
                    <div class="form-check form-check-radio form-group">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="role" id="role{{ $role->id }}" value="{{ $role->id }}">
                          <span class="form-check-sign"></span>
                          {{ $role->role }}
                        </label>
                      </div>
                      @endforeach
                      @endisset
                      @endisset
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="card ">
                    <div class="card-header ">
                      <div class="row">
                        <div class="col-md-4">
                          <h4 class="card-title">Role Privileges</h4>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="form-check float-right">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="checkall" id="checkall">
                                    <span class="form-check-sign"></span>
                                    Check All
                                  </label>
                                </div>
                        </div> 
                      </div>
                    </div>
                    <div class="card-body ">
                        @isset($setactions) 
                        @isset($actions)
                        @php $cabnames = array() @endphp
                        @foreach($actions as $action)
                        @if(in_array($action->process, $cabnames))
                        @else
                        <h6>{{ $action->process }}</h6>
                        @php $actionname = $action->process @endphp
                        <div class="row">
                          @foreach($actions as $newaction)
                          @if($newaction->process == $actionname)
                          <div class="col-md-3 form-group">
                            <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="newaction[]" id="{{ $newaction->id }}" value="{{ $newaction->id }}" @if(in_array($newaction->id, $setactions)) checked @endif>
                              <span class="form-check-sign"></span>
                              {{ $newaction->actions }}
                            </label>
                          </div>
                        </div>
                      @endif
                      @endforeach
                      </div>
                      @php array_push($cabnames, $action->process) @endphp
                      @endif
                      @endforeach
                      @endisset

                      @else
                      @isset($actions)
                      @php $cabnames = array() @endphp
                      @foreach($actions as $action)
                      @if(in_array($action->process, $cabnames))
                      @else
                      <h6>{{ $action->process }}</h6>
                      @php $actionname = $action->process @endphp
                      <div class="row">
                        @foreach($actions as $newaction)
                        @if($newaction->process == $actionname)
                        <div class="col-md-3 form-group">
                          <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="newaction[]" id="{{ $newaction->id }}" value="{{ $newaction->id }}">
                            <span class="form-check-sign"></span>
                            {{ $newaction->actions }}
                          </label>
                        </div>
                      </div>
                    @endif
                    @endforeach
                    </div>
                    @php array_push($cabnames, $action->process) @endphp
                    @endif
                    @endforeach
                    @endisset
                    @endisset
                      
                    <div id="message" class="alert"></div>
                    @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Privileges', 'Create') == 'allow')
                    <div class="col-md-4">
                    <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update Previleges">
                    <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                    </div>
                    @endif
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@include('layouts.footer')
@include('process.roles')