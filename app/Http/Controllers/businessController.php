<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;

use Mail;

class businessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function businessrequest(Request $request){
        
        return view('businessrequest');
    }
    
    
    public function submitbusinessrequest(Request $request){
        
        $ippis = $request->ippis;
        $membername = $request->membername;
    	$business = $request->business;
    	$amount = $request->amount;
    	$duration = $request->duration;
    	$adminpercent = $request->adminpercent;
    	$adminfeeamount = $request->adminfeeamount;
    	$monthlyamount = $request->monthlyamount;
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

    	$monthlyamount = $amount / $duration;

    	$data = array();

    	$data['name'] = $membername;
    	$data['ippisnumber'] = $ippis;
    	$data['business'] = $business;
    	$data['requestedamount'] = $amount;
    	$data['duration'] = $duration;
    	$data['adminpercent'] = $adminpercent;
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

    	$newrecord = DB::table('businessrequest')->insert($data);

    	if($newrecord){

    		//send email to admin regarding this application
    		$name = 'NigComSat MCS';
    		$email = 'admin@nigcomsatmcs.org';
    		$user = Auth::user()->name;

    		try{
	            //send email to the person concerned
	            Mail::send('emails.businessapplication', ['name' => $name, 'email' => $email, 'user' => $user], function ($message) use ($name, $email, $user) {
	            $message->to($email, $name)->subject('New Business Finance Application has been submitted at NigComSat MCS Portal');
	            $message->from('admin@nigcomsatmcs.org', 'NigComSat MCS');
	            });
	            }catch(\Exception $e){
	                return response()->json([

	                'message' => 'Business finance application created successfully',
	                'class_name' => 'alert-success btn-round'
	                ]);
	            }

	            return response()->json([

	                'message' => 'Business finance application created successfully',
	                'class_name' => 'alert-success btn-round'
	                ]);
    	}

    	
    }
    
    
    public function adminbusinessreport(Request $request){
        
        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

                $loans = DB::table('businessrequest')->get();

                $requestedamount = DB::table('businessrequest')->sum('requestedamount');

                $totalrepay = DB::table('businessrequest')->sum('totalrepay');
            

            return view('adminbusinessreport', ['loans' => $loans, 'requestedamount' => $requestedamount, 'totalrepay' => $totalrepay]);

        }
    }
    
    
    public function businessreport(Request $request){
        
        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

        
            $loans = DB::table('businessrequest')->where('ippisnumber', Auth::user()->ippisnumber)->get();

            $requestedamount = DB::table('businessrequest')->where('ippisnumber', Auth::user()->ippisnumber)->sum('requestedamount');

            $totalrepay = DB::table('businessrequest')->where('ippisnumber', Auth::user()->ippisnumber)->sum('totalrepay');


    	return view('businessreport', ['loans' => $loans, 'requestedamount' => $requestedamount, 'totalrepay' => $totalrepay]);
        
        }
        
    }
    
    
    public function businessdetails(Request $request){
        
        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $loans = DB::table('businessrequest')->where('id', $request->loan)->get();

            $savings = DB::table('cooperativesavings')->where('ippisnumber', Auth::user()->ippisnumber)->sum('amount');

            return view('businessdetails', ['loans' => $loans, 'savings' => $savings]);

        }
        
    }
    
    public function updatebusinessrequest(Request $request){
        
        $loandata = DB::table('businessrequest')->where('id', $request->id)->get();


        $ippis = $request->ippis;
        $membername = $request->membername;
        $business = $request->business;
        $amount = $request->amount;
        $duration = $request->duration;
        $adminpercent = $request->adminpercent;
        $adminfeeamount = $request->adminfeeamount;
        $monthlyamount = $request->monthamount;
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
        $data['business'] = $business;
        $data['requestedamount'] = $amount;
        $data['duration'] = $duration;
        $data['adminpercent'] = $adminpercent;
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

        $recordupdate = DB::table('businessrequest')->where('id', $request->id)->update($data);

        if($recordupdate){

            //send email to admin regarding this application
            $name = $membername;
            $email = $this->getuseremail($ippis);
            $status = $request->status;

            try{
                //send email to the person concerned
                Mail::send('emails.businessupdate', ['name' => $name, 'email' => $email, 'status' => $status], function ($message) use ($name, $email, $status) {
                $message->to($email, $name)->subject('Business Finance Application has been updated at NigComSat MCS Portal');
                $message->from('admin@nigcomsatmcs.org', 'NigComSat MCS');
                });
                }catch(\Exception $e){
                    return response()->json([

                    'message' => 'Business finance application updated successfully',
                    'class_name' => 'alert-success btn-round'
                    ]);
                }

                return response()->json([

                    'message' => 'Business finance application updated successfully',
                    'class_name' => 'alert-success btn-round'
                    ]);
        }
    }
    
    
    public function businessrepaymentreport(Request $request){
        
        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

        	$payments = DB::table('businessrepayment')
                            ->where('ippisnumber', Auth::user()->ippisnumber)
                            ->get();

            $total = DB::table('businessrepayment')
                            ->where('ippisnumber', Auth::user()->ippisnumber)
                            ->sum('amount');

        	return view('businessrepaymentreport', ['payments' => $payments, 'total' => $total]);

        }
    }
    
    
    public function adminbusinessrepaymentreport(Request $request){
        
        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $payments = DB::table('businessrepayment')
                            ->get();

            $total = DB::table('businessrepayment')
                            ->sum('amount');

            return view('adminbusinessrepaymentreport', ['payments' => $payments, 'total' => $total]);

        }
    }
    
    
}
