@include('layouts.extension')

<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="title">Registered Participants</h5>
      </div>
  <div class="card-body">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Participant ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Gender</th>
      <th>Participant Type</th>
      <th>Work Place</th>
      <th>Role</th>
      <th>Status</th>
      <th>Date Created</th>
      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Participants', 'Edit') == 'allow')
      <th class="disabled-sorting text-right">Actions</th>
      @endif
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Participant ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Gender</th>
      <th>Participant Type</th>
      <th>Work Place</th>
      <th>Role</th>
      <th>Status</th>
      <th>Date Created</th>
      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Participants', 'Edit') == 'allow')
      <th class="disabled-sorting text-right">Actions</th>
      @endif
    </tr>
  </tfoot>
  <tbody>
    @isset($users)
    @foreach($users as $user)

    <tr>
      <td>{{ $user->membershipid }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->phone }}</td>
      <td>{{ $user->gender }}</td>
      <td>{{ $user->membertype }}</td>
      <td>{{ $user->workplace }}</td>
      <td>{{ $user->role }}</td>
      <td>{{ $user->status }}</td>
      <td>{{ $user->created_at }}</td>
      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->role, 'Manage Participants', 'Edit') == 'allow')
      <td class="text-right">
        <a href="{{ url('participantdetails/?user='.$user->id) }}" class="btn btn-round btn-warning btn-icon btn-sm"><i class="far fa-calendar-alt"></i></a>
      </td>
      @endif
    </tr>

    @endforeach
    @endisset
    
  </tbody>
</table>
<div class="row">
  <div class="col-md-3">
    <strong></strong>
  </div>
  <div class="col-md-3">
    <strong></strong>
  </div>
</div>

</div>
    </div>
  </div>
</div>
</div>
@include('layouts.footer')
@include('process.users')