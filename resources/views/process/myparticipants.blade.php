<div class="col-md-12">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Member ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Gender</th>
                      <th>Participant Type</th>
                      <th>Account Status</th>
                      <th>Created By</th>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'My Participants', 'Edit') == 'allow')
                      <th class="disabled-sorting text-right">Actions</th>
                      @endif
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Member ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Gender</th>
                      <th>Participant Type</th>
                      <th>Account Status</th>
                      <th>Created By</th>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'My Participants', 'Edit') == 'allow')
                      <th class="disabled-sorting text-right">Actions</th>
                      @endif
                    </tr>
                  </tfoot>
                  <tbody>
                    @isset($users)
                    @foreach($users as $user)

                    <tr>
                      <td>{{ $user->membershipid }}</td>
                      <td>{{ $user->title }} {{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->gender }}</td>
                      <td>{{ $user->membertype }}</td>
                      <td>{{ $user->status }}</td>
                      <td>@php echo app\Http\Controllers\Controller::getusername($user->created_by) @endphp</td>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'My Participants', 'Edit') == 'allow')
                      <td class="text-right">
                        
                        <a href="{{ url('myparticipantdetails/?user='.$user->id) }}" id="edit{{ $user->id }}" class="btn btn-round btn-warning btn-icon btn-sm edits"><i class="far fa-calendar-alt"></i></a>
                        
                        
                        
                      </td>
                     @endif
                    </tr>

                    @endforeach
                    @endisset
                    
                  </tbody>
                </table>
            </div>