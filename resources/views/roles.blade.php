@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">New Roles</h5>
              </div>
              <div class="card-body">
                <form id="createrole" action="submitrole" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Role</label>
                        <input type="text" name="role" id="role" class="form-control" placeholder="Enter Role Name" value="" required>
                        <input type="hidden" name="id" id="id">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Create') == 'allow')
                    <div class="col-md-4 pl-1">
                     
                      <div class="form-group float-right">
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update Role">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                      </div>
                      
                    </div>
                    @endif
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <p id="message" class="alert"></p>
                      </div>
                    </div>
                  </div>

                  <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Roles</th>
                      <th>Created By</th>
                      <th>Date Created</th>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'View') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Delete') == 'allow')
                      <th class="disabled-sorting text-right">Actions</th>
                      @endif
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Roles</th>
                      <th>Created By</th>
                      <th>Date Created</th>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'View') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Delete') == 'allow')
                      <th class="disabled-sorting text-right">Actions</th>
                      @endif
                    </tr>
                  </tfoot>
                  <tbody>
                    @isset($roles)
                    @foreach($roles as $role)

                    <tr>
                      <td id="catname{{ $role->id }}">{{ $role->role }}</td>
                      <td>@php echo app\Http\Controllers\Controller::getusername($role->created_by) @endphp</td>
                      <td>{{ $role->created_at }}</td>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Delete') == 'allow')
                      <td class="text-right" id="button{{ $role->id }}">
                        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Edit') == 'allow')
                        <a href="{{ $role->id }}" id="edit{{ $role->id }}" class="btn btn-round btn-warning btn-icon btn-sm edit"><i class="far fa-calendar-alt"></i></a>
                        @endif
                        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Edit') == 'allow')
                        <a href="{{ url('roleprevileges/?role='.$role->id) }}" class="btn btn-round btn-info btn-icon btn-sm"><i class="fa fa-tasks"></i></a>
                        @endif
                        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Roles', 'Delete') == 'allow')
                        <a href="{{ $role->id }}" class="btn btn-round btn-danger btn-icon btn-sm remove"><i class="fas fa-times"></i></a>
                        @endif
                      </td>
                      @endif
                    </tr>

                    @endforeach
                    @endisset
                    
                  </tbody>
                </table>
                  
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
@include('process.roles')