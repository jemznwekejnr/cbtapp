@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">New Product Category</h5>
              </div>
              <div class="card-body">
                <form id="newcategory" action="createcategory" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category" id="category" class="form-control" placeholder="Category Name" value="" required>
                        <input type="hidden" name="catid" id="catid">
                        <input type="hidden" name="oldcategory" id="oldcategory">
                      </div>
                    </div>
                    <div class="col-md-3 px-1"></div>
                    <div class="col-md-3 pl-1 float-right">
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Product Category', 'Create') == 'allow')
                      <div class="form-group float-right">
                      <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Update Category">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                      </div>
                      @endif
                    </div>
                  </div>
                  
                  
                  <div class="row">
                    <div class="col-md-4">
                      
                    
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                        
                        
                        
                      
                    </div>
                  </div>
                  
                </form>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div id="message" class="alert"></div>
                      </div>
                    </div>
                  </div>

                  <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>No of Products</th>
                      <th>Created By</th>
                      <th>Date Created</th>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Product Category', 'Edit') == 'allow')
                      <th class="disabled-sorting text-right">Actions</th>
                      @endif
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Category Name</th>
                      <th>No of Products</th>
                      <th>Created By</th>
                      <th>Date Created</th>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Product Category', 'Edit') == 'allow')
                      <th class="disabled-sorting text-right">Actions</th>
                      @endif
                    </tr>
                  </tfoot>
                  <tbody>
                    @isset($categorys)
                    @foreach($categorys as $category)

                    <tr>
                      <td id="catname{{ $category->id }}">{{ $category->category }}</td>
                      <td>{{ $category->numberofproducts }}</td>
                      <td>@php echo app\Http\Controllers\Controller::getusername($category->created_by) @endphp</td>
                      <td>{{ $category->created_at }}</td>
                      @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Product Category', 'Edit') == 'allow')
                      <td class="text-right" id="button{{ $category->id }}">
                        
                        <a href="{{ $category->id }}" id="edit{{ $category->id }}" class="btn btn-round btn-warning btn-icon btn-sm edit"><i class="far fa-calendar-alt"></i></a>
                        
                      </td>
                      <td class="processing" id="processing{{ $category->id }}">
                        <img src="{{ asset('assets/img/processing.gif') }}">
                      </td>
                      @endif
                    </tr>

                    @endforeach
                    @endisset
                    
                  </tbody>
                </table>
               
              </div>
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
@include('layouts.footer')
@include('process.products')