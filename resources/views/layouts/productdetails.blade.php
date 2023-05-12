@include('layouts.extension')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-stats">
              <div class="card-body">
                  @isset($product)
                    <h3><strong>Product Details</strong></h3>
                  <div class="card-body">
                      <div class="form-group">
                        <label><strong>IPPIS Number</strong></label>
                        <p class="form-control">{{ $product[0]->ippisnumber }}</p>
                      </div>
                      <div class="form-group">
                        <label><strong>Name</strong></label>
                        <p class="form-control">{{ $product[0]->name }}</p>
                      </div>
                      <div class="form-group">
                        <label><strong>Account Type</strong></label>
                        <p class="form-control">{{ $product[0]->accounttype }}</p>
                      </div>
                      <div class="form-group">
                        <label><strong>Persons Involved</strong></label>
                        <p class="form-control">{{ $product[0]->NamesofOffendant }}</p>
                      </div>
                      <div class="form-group">
                        <label><strong>Gender</strong></label>
                        <p class="form-control">{{ $product[0]->Gender }}</p>
                      </div>
                      <div class="form-group">
                        <label><strong>Nationality</strong></label>
                        <p class="form-control">{{ $product[0]->NationalityofOffendant }}</p>
                      </div>
                      <div class="form-group">
                        <label><strong>Location of Incidence</strong></label>
                        <p class="form-control">{{ $product[0]->LocationofIncidence }}</p>
                      </div>
                      <div class="form-group">
                        <label><strong>Additional Information</strong></label>
                        <p class="form-control">{{ $product[0]->AdditionalInformation }}</p>
                      </div>
                      <div class="form-group">
                        <label><strong>Source of Report</strong></label>
                        <p class="form-control">{{ $product[0]->SourceofReportText }}</p>
                      </div>
                  </div>
                  @endisset
              </div>
            </div>
          </div>
        </div>
      </div>
@include('layouts.footer')