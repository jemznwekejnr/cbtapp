@include('layouts.extension')

      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Request Loan</h5>
              </div>
              <div class="card-body">
                <form id="loanapplication" action="submitloanrequest" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                
                  
                  <div class="row">
                    <div class="col-md-9 pr-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="membername" name="membername" value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>IPPIS Number</label>
                        <input type="text" name="ippis" id="ippis" class="form-control" value="{{ Auth::user()->ippisnumber }}" placeholder="Enter IPPIS Number" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Loan Type</label>
                        <select name="loantypse" id="loantypse" class="form-control selectpicker" data-style="btn btn-round" required>
                        <option value="">Select Loan Type</option>
                          @isset($loantypes)
                          @foreach($loantypes as $loantype)
                          <option value="{{ $loantype->id }}">{{ $loantype->loantype }}</option>
                          @endforeach
                          @endisset
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Requested Amount (&#x20A6;)</label>
                        <input type="text" name="amount" id="amounts" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Enter requested amount" maxlength="11" required>
                        <input type="hidden" id="qualified">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Duration (Months)</label>
                         <select name="duration" id="duration" class=" form-control selectpicker" data-style="btn btn-round" required>
                        <option value="">Select</option>
                        @for($i=1; $i<= 36; $i++)
                        <option>{{ $i }}</option>
                        @endfor
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Admin Fee (&#x20A6;)</label>
                        <p class="form-control" id="adminfee">Calculated</p>
                        <input type="hidden" id="adminfeeper">
                        <input type="hidden" id="adminfeeamount" name="adminfeeamount">
                      </div>
                    </div> 
                    
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Repayment Method</label>
                        <select name="repaymentmethod" id="repaymentmethod" required data-style="btn-round" class="form-control  selectpicker">
                          <option>Deduct from Source</option>
                          <option>Monthly Payment</option>
                          <option>Direct Debit</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                        <label>Recipient Name</label>
                        <input type="text" name="recipientname" id="recipientname" class="form-control" placeholder="Enter recipient name" required>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" name="bankname" required id="bankname" class="form-control" placeholder="Enter bank name">
                      </div>
                    </div> 
                    
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Account Name</label>
                        <input type="text" id="accountname" required name="accountname" class="form-control" placeholder="Enter accountname">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" id="accountnumber" maxlength="10" onkeypress="return isNumberKey(event)" name="accountnumber" class="form-control" required placeholder="Enter account number">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Do You Have Any Loan Running?</label>
                        <select name="runningloan" id="runningloan" class="form-control selectpicker" data-style="btn btn-round" required>
                        <option value="">Select Option</option>
                          <option>Yes</option>
                          <option>No</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row" id="runningloandiv">
                    
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Loan Type</label>
                        <select name="runningloantype" id="runningloantype" class="form-control selectpicker" data-style="btn btn-round">
                        <option value="">Select Option</option>
                          <option>Bank Loan</option>
                          <option>Business Purchase</option>
                          <option>Other Loans</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Principal Amount</label>
                        <input type="text" name="runningloanamount" onkeypress="return isNumberKey(event)" id="runningloanamount" class="form-control" placeholder="Enter Principal Amount" value="" maxlength="11" >
                      </div>
                    </div>
                     
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Monthly Repayment</label>
                        <input type="text" name="runningloanmonthly" onkeypress="return isNumberKey(event)" id="runningloanmonthly" class="form-control" placeholder="Running loan monthly repayment" maxlength="11" >
                      </div>
                    </div>
                  </div>
                  <br />
                  <h5 class="title">Declarations</h5>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" required type="checkbox" value="I am not indebted to any bank, co-operative society or loan agency, either as a borrower or guarantor, except as stated above" name="indebtedness" id="indebtedness" data-on-label="<i class='now-ui-icons ui-1_check'></i>" data-off-label="<i class='now-ui-icons ui-1_simple-remove'></i>">
                          <span class="form-check-sign"></span>
                          I am not indebted to any bank, co-operative society or loan agency, either as a borrower or guarantor, except as stated above.
                        </label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" required type="checkbox" value="I agree to permit the co-operative to carry out a credit check on myself if ther deem it necessary" name="creditcheck" id="creditcheck" data-on-label="<i class='now-ui-icons ui-1_check'></i>" data-off-label="<i class='now-ui-icons ui-1_simple-remove'></i>">
                          <span class="form-check-sign"></span>
                          I agree to permit the co-operative to carry out a credit check on myself if ther deem it necessary.
                        </label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" required value="I have read and understood the guidline required for this loan application" type="checkbox" name="guidline" id="guidline" data-on-label="<i class='now-ui-icons ui-1_check'></i>" data-off-label="<i class='now-ui-icons ui-1_simple-remove'></i>">
                          <span class="form-check-sign"></span>
                          I have read and understood the guidline required for this loan application.
                        </label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" required type="checkbox" value="I   declare that the information I have given on this form is to the best of knowledge and belief, accurate and full information. I understand that the provision of false information is fraud and the co-operative society may take appropriate action if I am found to have deliberately provided false or misleading information" name="attestation" id="attestation" data-on-label="<i class='now-ui-icons ui-1_check'></i>" data-off-label="<i class='now-ui-icons ui-1_simple-remove'></i>">
                          <span class="form-check-sign"></span>
                          I   declare that the information I have given on this form is to the best of knowledge and belief, accurate and full information. I understand that the provision of false information is fraud and the co-operative society may take appropriate action if I am found to have deliberately provided false or misleading information.
                        </label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <br />
                  <h5 class="title">Guarantor Details</h5>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>IPPIS Number</label>
                        <input type="text" name="guarantorid" id="guarantorid" class="form-control" placeholder="Enter Guarantor ID" required>
                      </div>
                    </div>
                    <div class="col-md-8 pl-1">
                      <div class="form-group">
                        <label>Guarantor Name</label>
                        <input type="text" name="guarantorname" id="guarantorname" class="form-control" placeholder="Enter Guarantor Name" value="" required>
                      </div>
                    </div>
                     
                  </div>
                  <h4><strong>Upload Three Most Recent Payslips</strong></h4>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>First Payslip</label>
                        <div class="form-group">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Upload Passport</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="payslip1" id="payslip1" required value="" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp" />
                          </span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                      </div>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Second Payslip</label>
                        <div class="form-group">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Upload Passport</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="payslip2" id="payslip2" required value="" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp" />
                          </span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                      </div>
                      </div>
                    </div>
                     
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Third Payslip</label>
                        <div class="form-group">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Upload Passport</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="payslip3" id="payslip3" required value="" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp" />
                          </span>
                          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                      </div>
                      </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <p id="message" class="alert"></p>
                      </div>
                    </div>
                  </div>
                  @if(App\Http\Controllers\Controller::confirmprivilege(Auth::user()->userrole, 'Loan Request', 'Create') == 'allow')
                  <div class="row">
                    <div class="col-md-4">
                      
                    
                    </div>
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                      </div>
                    </div>
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        
                        <input type="submit" id="button" class="btn btn-round btn-warning btn-lg" value="Submit Request">
                        <img src="{{ asset('assets/img/processing.gif') }}" id="processing">
                        
                      </div>
                    </div>
                  </div>
                  @endif
                </form>

               
              </div>
            </div>
          </div>
          @include('layouts.profile')
        </div>
      </div>
@include('layouts.footer')
@include('process.loans')