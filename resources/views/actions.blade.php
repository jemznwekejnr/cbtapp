@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Manage Actions</h5>
              </div>
              <div class="card-body">
                <form id="createaction" action="submitaction" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Actions</label>
                        <input type="text" name="action" id="action" class="form-control" placeholder="Enter Action Name" value="" required>
                        <input type="hidden" name="id" id="id">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Actions', 'Create') == 'allow')
                    <div class="col-md-4 pl-1">
                      
                      <div class="form-group float-right">
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update Action">
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
                      <th>Processes</th>
                      <th>Actions</th>
                      <th>Created By</th>
                      <th>Date Created</th>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Actions', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Actions', 'Delete') == 'allow')
                      <th class="disabled-sorting text-right">Actions</th>
                      @endif
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Processes</th>
                      <th>Actions</th>
                      <th>Created By</th>
                      <th>Date Created</th>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Actions', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Actions', 'Delete') == 'allow')
                      <th class="disabled-sorting text-right">Actions</th>
                      @endif
                    </tr>
                  </tfoot>
                  <tbody>
                    @isset($actions)
                    @foreach($actions as $action)

                    <tr>
                      <td>{{ $action->process }}</td>
                      <td>{{ $action->actions }}</td>
                      <td>@php echo app\Http\Controllers\Controller::getusername($action->created_by) @endphp</td>
                      <td>{{ $action->created_at }}</td>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Actions', 'Edit') == 'allow' || App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Actions', 'Delete') == 'allow')
                      <td class="text-right" id="button{{ $action->id }}">
                        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Actions', 'Edit') == 'allow')
                        <a href="{{ $action->id }}" id="edit{{ $action->id }}" class="btn btn-round btn-warning btn-icon btn-sm edit"><i class="far fa-calendar-alt"></i></a>
                        @endif
                        @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Actions', 'Delete') == 'allow')
                        <a href="{{ $action->id }}" class="btn btn-round btn-danger btn-icon btn-sm remove"><i class="fas fa-times"></i></a>
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
@include('process.actions')