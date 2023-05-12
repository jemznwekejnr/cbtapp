<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use DB;

use Validator;

use Auth;

use Mail;

class loanController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function loanrequest(){

    	$states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

        $loantypes = DB::table('loantypes')->get();

    	return view('loanrequest', ['loantypes' => $loantypes]);

        }
    }

    public function loanrepayment(){

    	return view('loanrepayment');
    }

    public function loantypes(){

    	$states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

        $loantypes = DB::table('loantypes')->get();

    	return view('loantypes', ['loantypes' => $loantypes]);

        }
    }


    public function newloantype(Request $request){

    	$validator = Validator::make($request->all(), [

    		'loantype' => 'required',
    		'adminfee' => 'required',
    		'allowedamount' => 'required',
    		'maxduration' => 'required',

    	]);

    	if($validator->passes()){

    		$loantype = $request->loantype;
	    	$adminfee = $request->adminfee;
	    	$allowedamount = $request->allowedamount;
	    	$maxduration = $request->maxduration;

    		

	    	$data = array();

	    	$data['loantype'] = $loantype;
	    	$data['adminfee_per'] = $adminfee;
	    	$data['maximumallowed_per'] = $allowedamount;
	    	$data['maximumduration_months'] = $maxduration;
	    	$data['managed_by'] = Auth::user()->id;
	    	$data['created_at'] = date('Y-m-d H:i:s');

	    	$newrecord = DB::table('loantypes')
	    				->updateOrInsert(
						        ['id' => $request->id],
						        ['loantype' => $loantype, 'adminfee_per' => $adminfee, 'maximumallowed_per' => $allowedamount, 'maximumduration_months' => $maxduration, 'managed_by' => Auth::user()->id, 'created_at' => date('Y-m-d H:i:s')]
						    );

	    	if($newrecord){

	    		$name = 'NigComSat MCS';
	    		$email = 'admin@nigcomsatmcs.org';
	    		$user = Auth::user()->name;

	    		try{
		            //send email to the person concerned
		            Mail::send('emails.loantypes', ['name' => $name, 'email' => $email, 'user' => $user, 'loantype' => $loantype], function ($message) use ($name, $email, $user, $loantype) {
		            $message->to($email, $name)->subject('New Loan Type Created at NigComSat MCS Portal');
		            $message->from('admin@nigcomsatmcs.org', 'NigComSat MCS');
		            });
		            }catch(\Exception $e){
		                return response()->json([

		                'message' => 'Loan type created successfully',
		                'class_name' => 'alert-success btn-round'
		                ]);
		            }


		            return response()->json([

		                'message' => 'Loan type created successfully',
		                'class_name' => 'alert-success btn-round'
		                ]);
	    	}

	    

    	}else{

    		return response()->json([
    			'message' => $validator->errors()->all(),
    			'class_name' => 'alert-danger'
    		]);
    	}

    	
    }


    public function fetchloan(Request $request){

    	$loan = DB::table('loantypes')->where('id', $request->id)->get();

    	return response()->json([
    		'id' => $loan[0]->id,
    		'loantype' => $loan[0]->loantype,
    		'adminfee' => $loan[0]->adminfee_per,
    		'maximumallowed' => $loan[0]->maximumallowed_per,
    		'maximumduration' => $loan[0]->maximumduration_months,
    		'createdby' => $loan[0]->managed_by,
    		'createdat' => $loan[0]->created_at,
    	]);
    }

    public function getmaxduration(Request $request){

    	$duration = DB::table('loantypes')->where('id', $request->loantype)->value('maximumduration_months');

    	$allowed = DB::table('loantypes')->where('id', $request->loantype)->value('maximumallowed_per');

    	$adminfee = DB::table('loantypes')->where('id', $request->loantype)->value('adminfee_per');

    	$savings = DB::table('cooperativesavings')->where('ippisnumber', $request->ippis)->sum('amount');


    	if($savings != NULL && $savings > 0){
    	$allowed_per = $allowed / 100;

    	$allowed_amount = $allowed_per * $savings;
	    }else{
	    	$allowed_amount = 0;
	    }

        //dd($allowed_amount);

    	return response()->json([
    		'duration' => $duration,
    		'allowed' => $allowed_amount,
    		'percent' => $allowed,
    		'adminfee' => $adminfee,
    	]);
    }


    public function submitloanrequest(Request $request){

    	$ippis = $request->ippis;
        $membername = $request->membername;
    	$loantypse = $request->loantypse;
    	$amount = $request->amount;
    	$duration = $request->duration;
    	$adminfeeamount = $request->adminfeeamount;
    	$repaymentmethod = $request->repaymentmethod;
    	$recipientname = $request->recipientname;
    	$bankname = $request->bankname;
    	$accountname = $request->accountname;
    	$accountnumber = $request->accountnumber;
    	$runningloan = $request->runningloan;
    	$runningloantype = $request->runningloantype;
    	$runningloanamount = $request->runningloanamount;
    	$runningloanmonthly = $request->runningloanmonthly;
    	$indebtedness = $request->indebtedness;
    	$creditcheck = $request->creditcheck;
    	$guidline = $request->guidline;
    	$attestation = $request->attestation;
    	$guarantorid = $request->guarantorid;
    	$guarantorname = $request->guarantorname;
    	$payslip1 = $request->file('payslip1');
    	$payslip2 = $request->file('payslip2');
    	$payslip3 = $request->file('payslip3');

    	if(!empty($payslip1)){

    		$payslip1 = $payslip1->store('assets/attachments');
    	}

    	if(!empty($payslip2)){

    		$payslip2 = $payslip2->store('assets/attachments');
    	}

    	if(!empty($payslip3)){

    		$payslip3 = $payslip3->store('assets/attachments');
    	}

    	//check if user has a running loan

    	$checkloan = DB::table('loanrequest')
    				->where([['ippisnumber', $ippis], ['loantype', $loantypse], ['status', '!=', 'Repaid Completely']])
    				->count();

    	if($checkloan == 1){

    		return response()->json([
	    		'message' => $membername.' currently have a '.$this->getloanname($loantypse).' running and cannot proceed with this application.',
	    		'class_name' => 'alert-danger'
    		]);
    	
    	}else{

    	$monthlyamount = $amount / $duration;

    	$data = array();

    	$data['name'] = $membername;
    	$data['ippisnumber'] = $ippis;
    	$data['loantype'] = $loantypse;
    	$data['requestedamount'] = $amount;
    	$data['duration'] = $duration;
    	$data['adminfee'] = $adminfeeamount;
    	$data['repaymentmethod'] = $repaymentmethod;
    	$data['recipientname'] = $recipientname;
    	$data['bankname'] = $bankname;
    	$data['accountname'] = $accountname;
    	$data['accountnumber'] = $accountnumber;
    	$data['otherloans'] = $runningloan;
    	$data['otherloantype'] = $runningloantype;
    	$data['principalamount'] = $runningloanamount;
    	$data['monthlyrepayment'] = $runningloanmonthly;
    	$data['notindebted'] = $indebtedness;
    	$data['creditcheckpermit'] = $creditcheck;
    	$data['loanguideline'] = $guidline;
    	$data['applicantdeclaration'] = $attestation;
    	$data['gurantorname'] = $guarantorname;
    	$data['guarantorid'] = $guarantorid;
        $data['payslip1'] = $payslip1;
        $data['payslip2'] = $payslip2;
        $data['payslip3'] = $payslip3;
    	$data['status'] = 'Application Submitted';
    	$data['monthlyamount'] = number_format($monthlyamount, 2);
    	$data['totalrepay'] = 0.00;
    	$data['monthscompleted'] = 0;
    	$data['created_at'] = date('Y-m-d H:i:s');

    	$newrecord = DB::table('loanrequest')->insert($data);

    	if($newrecord){

    		//send email to admin regarding this application
    		$name = 'NigComSat MCS';
    		$email = 'admin@nigcomsatmcs.org';
    		$user = Auth::user()->name;

    		try{
	            //send email to the person concerned
	            Mail::send('emails.loanapplication', ['name' => $name, 'email' => $email, 'user' => $user], function ($message) use ($name, $email, $user) {
	            $message->to($email, $name)->subject('New Loan Application has been submitted at NigComSat MCS Portal');
	            $message->from('admin@nigcomsatmcs.org', 'NigComSat MCS');
	            });
	            }catch(\Exception $e){
	                return response()->json([

	                'message' => 'Loan application created successfully',
	                'class_name' => 'alert-success btn-round'
	                ]);
	            }

	            return response()->json([

	                'message' => 'Loan application created successfully',
	                'class_name' => 'alert-success btn-round'
	                ]);
    	}

    	}
    }


    public function loanreport(Request $request){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

        
            $loans = DB::table('loanrequest')->where('ippisnumber', Auth::user()->ippisnumber)->get();

            $requestedamount = DB::table('loanrequest')->where('ippisnumber', Auth::user()->ippisnumber)->sum('requestedamount');

            $totalrepay = DB::table('loanrequest')->where('ippisnumber', Auth::user()->ippisnumber)->sum('totalrepay');


    	return view('loanreport', ['loans' => $loans, 'requestedamount' => $requestedamount, 'totalrepay' => $totalrepay]);
        
        }

    }


    public function adminloanreport(Request $request){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            if(isset($request->type)){

                $loans = DB::table('loanrequest')->where('loantype', $request->type)->get();

                $requestedamount = DB::table('loanrequest')->where('loantype', $request->type)->sum('requestedamount');

                $totalrepay = DB::table('loanrequest')->where('loantype', $request->type)->sum('totalrepay');

            }else{

                $loans = DB::table('loanrequest')->get();

                $requestedamount = DB::table('loanrequest')->sum('requestedamount');

                $totalrepay = DB::table('loanrequest')->sum('totalrepay');
            }

            return view('adminloanreport', ['loans' => $loans, 'requestedamount' => $requestedamount, 'totalrepay' => $totalrepay]);

        }

    }

    public function loanrepaymentreport(Request $request){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

        	$payments = DB::table('loanrepayment')
                            ->where('ippisnumber', Auth::user()->ippisnumber)
                            ->get();

            $total = DB::table('loanrepayment')
                            ->where('ippisnumber', Auth::user()->ippisnumber)
                            ->sum('amount');

        	return view('loanrepaymentreport', ['payments' => $payments, 'total' => $total]);

        }
    }


    public function adminloanrepaymentreport(Request $request){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $payments = DB::table('loanrepayment')
                            ->get();

            $total = DB::table('loanrepayment')
                            ->sum('amount');

            return view('adminloanrepaymentreport', ['payments' => $payments, 'total' => $total]);

        }
    }


    public function uploadcashloanrepayment(){

    	return view('uploadcashloanrepayment');
    }


    public function loandetails(Request $request){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $loans = DB::table('loanrequest')->where('id', $request->loan)->get();

            $loandetails = DB::table('loantypes')->where('id', $loans[0]->loantype)->get();

            $loanrepayments = DB::table('loanrepayment')->where('loanid', $request->loan)->get();

            $maximumallowed = ($loandetails[0]->maximumallowed_per / 100) * $loans[0]->requestedamount;

            return view('loandetails', ['loans' => $loans, 'maximumallowed' => $maximumallowed]);

        }
    }



    public function updateloanrequest(Request $request){

        $loandata = DB::table('loanrequest')->where('id', $request->id)->get();


        $ippis = $request->ippis;
        $membername = $request->membername;
        $loantypse = $request->loantypse;
        $amount = $request->amount;
        $duration = $request->duration;
        $adminfeeamount = $request->adminfeeamount;
        $repaymentmethod = $request->repaymentmethod;
        $recipientname = $request->recipientname;
        $bankname = $request->bankname;
        $accountname = $request->accountname;
        $accountnumber = $request->accountnumber;
        $runningloan = $request->runningloan;
        $runningloantype = $request->runningloantype;
        $runningloanamount = $request->runningloanamount;
        $runningloanmonthly = $request->runningloanmonthly;
        $indebtedness = $request->indebtedness;
        $creditcheck = $request->creditcheck;
        $guidline = $request->guidline;
        $attestation = $request->attestation;
        $guarantorid = $request->guarantorid;
        $guarantorname = $request->guarantorname;
        $status = $request->status;
        $comment = $request->comment;
        $payslip1 = $request->file('payslip1');
        $payslip2 = $request->file('payslip2');
        $payslip3 = $request->file('payslip3');

        if(!empty($payslip1)){

            $payslip1 = $payslip1->store('assets/attachments');
        }else{
            $payslip1 = $loandata[0]->payslip1;
        }

        if(!empty($payslip2)){

            $payslip2 = $payslip2->store('assets/attachments');
        }else{
            $payslip2 = $loandata[0]->payslip2;
        }

        if(!empty($payslip3)){

            $payslip3 = $payslip3->store('assets/attachments');
        }else{
            $payslip3 = $loandata[0]->payslip3;
        }

        //check if user has a running loan

        if($request->status == 'Disbursed'){
            $status = 'Repayment in Progress';
        }else{
            $status = $request->status;
        }

        $monthlyamount = $amount / $duration;

        $data = array();

        $data['name'] = $membername;
        $data['ippisnumber'] = $ippis;
        $data['loantype'] = $loantypse;
        $data['requestedamount'] = $amount;
        $data['duration'] = $duration;
        $data['adminfee'] = $adminfeeamount;
        $data['repaymentmethod'] = $repaymentmethod;
        $data['recipientname'] = $recipientname;
        $data['bankname'] = $bankname;
        $data['accountname'] = $accountname;
        $data['accountnumber'] = $accountnumber;
        $data['otherloans'] = $runningloan;
        $data['otherloantype'] = $runningloantype;
        $data['principalamount'] = $runningloanamount;
        $data['monthlyrepayment'] = $runningloanmonthly;
        $data['notindebted'] = $indebtedness;
        $data['creditcheckpermit'] = $creditcheck;
        $data['loanguideline'] = $guidline;
        $data['applicantdeclaration'] = $attestation;
        $data['gurantorname'] = $guarantorname;
        $data['guarantorid'] = $guarantorid;
        $data['payslip1'] = $payslip1;
        $data['payslip2'] = $payslip2;
        $data['payslip3'] = $payslip3;
        $data['status'] = $status;
        $data['comment'] = $request->comment;
        $data['monthlyamount'] = number_format($monthlyamount, 2);
        $data['totalrepay'] = 0.00;
        $data['monthscompleted'] = 0;
        $data['created_at'] = date('Y-m-d H:i:s');

        $recordupdate = DB::table('loanrequest')->where('id', $request->id)->update($data);

        if($recordupdate){

            //send email to admin regarding this application
            $name = $membername;
            $email = $this->getuseremail($ippis);
            $status = $request->status;

            try{
                //send email to the person concerned
                Mail::send('emails.loanupdate', ['name' => $name, 'email' => $email, 'status' => $status], function ($message) use ($name, $email, $status) {
                $message->to($email, $name)->subject('Loan Application has been updated at NigComSat MCS Portal');
                $message->from('admin@nigcomsatmcs.org', 'NigComSat MCS');
                });
                }catch(\Exception $e){
                    return response()->json([

                    'message' => 'Loan application updated successfully',
                    'class_name' => 'alert-success btn-round'
                    ]);
                }

                return response()->json([

                    'message' => 'Loan application updated successfully',
                    'class_name' => 'alert-success btn-round'
                    ]);
        }


    }

    
}
