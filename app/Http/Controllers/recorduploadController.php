<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Imports\SavingsImport;
use App\Imports\LoansImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Carbon;

use DB;

use Validator;

use Auth;

use Mail;

use DateTime;

class recorduploadController extends Controller
{
    //authenticate user
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadrecords(){

    	$states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

    		return view('uploadrecords');

    	}
    }

    public static function alreadycreatedsavings($ippis, $month){

    	$record = DB::table('cooperativesavings')
    						->where([
    									['ippisnumber', $ippis], 
    									['month', $month]
    								])->count();
    	if($record == 1){

    		return true;
    	}else{
    		return false;
    	}
    }


    public static function alreadycreatedloan($ippis, $month, $loantype){

    	$record = DB::table('loanrepayment')
    						->where([
    									['ippisnumber', $ippis],
    									['loantype', $loantype], 
    									['month', $month]
    								])->count();
    	if($record == 1){

    		return true;
    	}else{
    		return false;
    	}
    }

    public static function getloanid($ippis, $loantype){

    	$record = DB::table('loanrequest')
    				->where([
    							['ippisnumber', $ippis], 
    							['loantype', $loantype], 
    							['status', 'Repayment in Progress']
    						])->value('id');

    	return $record;
    }

    public static function alreadycreatedproduct($ippis, $month){

    	$record = DB::table('productloanrepay')
    						->where([
    									['ippisnumber', $ippis],
    									['month', $month]
    								])->count();
    	if($record == 1){

    		return true;
    	}else{
    		return false;
    	}
    }
    
    
    public static function alreadycreatedbusiness($ippis, $month){
        
        $record = DB::table('businessrepayment')
    						->where([
    									['ippisnumber', $ippis],
    									['month', $month]
    								])->count();
    	if($record == 1){

    		return true;
    	}else{
    		return false;
    	}
    }


    public static function productid($ippis){

    	$loanid = DB::table('productrequest')
    				->where([
    							['ippisnumber', $ippis], 
    							['status', 'Repayment in Progress']
    						])
					->orderBy('created_at', 'asc')
					->limit(1)
					->value('id');

    	return $loanid;
    }
    
    public static function getlbusinessid($ippis){
        
        $loanid = DB::table('businessrequest')
    				->where([
    							['ippisnumber', $ippis], 
    							['status', 'Repayment in Progress']
    						])
					->orderBy('created_at', 'asc')
					->limit(1)
					->value('id');
					
        return $loanid;
    }


    public static function getaccounttype($ippis){

    	$accounttype = DB::table('users')->where('ippisnumber', $ippis)->count();

    	if($accounttype == 1){

    		return 'Cooperative Member';
    	
    	}else{

    		return 'Non-Cooperative Member';
    	}
    }


    public static function amountpaidsofar($ippis, $type, $id, $category){

    	if($type == 'Products'){

	    	$amountpaid = DB::table('productrequest')
	    					->where([
	    								['ippisnumber', $ippis],
        								['id', $id]
	    							])
	    					->orderBy('created_at', 'asc')
	    					->limit(1)
	    					->value('totalrepay');

	    	return $amountpaid;

	    }else if($type == 'Loans' && $category == 'Soft Loan'){

	    	$amountpaid = DB::table('loanrequest')
        					->where([
        								['ippisnumber', $ippis],
        								['id', $id]
        							])
	    					->value('totalrepay');

	    	return $amountpaid;

	    }else if($type == 'Loans' && $category == 'Normal Loan'){

	    	$amountpaid = DB::table('loanrequest')
        					->where([
        								['ippisnumber', $ippis],
        								['id', $id]
        							])
	    					->value('totalrepay');

	    	return $amountpaid;
	    	
	    }else if($type == 'Business'){

	    	$amountpaid = DB::table('businessrequest')
        					->where([
        								['ippisnumber', $ippis],
        								['id', $id]
        							])
	    					->value('totalrepay');

	    	return $amountpaid;
	    }

    }


    public static function amountrequested($ippis, $type, $id, $category){

    	if($type == 'Products'){

	    	$amountrequest = DB::table('productrequest')
    					->where([
    								['ippisnumber', $ippis],
        							['id', $id]
    							])
    					->orderBy('created_at', 'asc')
    					->limit(1)
    					->value('payableamount');

    		return $amountrequest;

	    }else if($type == 'Loans' && $category == 'Soft Loan'){

	    	$amountrequest = DB::table('loanrequest')
        					->where([
        								['ippisnumber', $ippis],
        								['id', $id]
        							])
	    					->value('requestedamount');

	    	return $amountrequest;
	    	
	    }else if($type == 'Loans' && $category == 'Normal Loan'){

	    	$amountrequest = DB::table('loanrequest')
        					->where([
        								['ippisnumber', $ippis],
        								['id', $id]
        							])
	    					->value('requestedamount');

	    	return $amountrequest;
	    	
	    }else if($type == 'Business'){

	    	$amountrequest = DB::table('loanrequest')
        					->where([
        								['ippisnumber', $ippis],
        								['id', $id]
        							])
	    					->value('requestedamount');

	    	return $amountrequest;
	    }

    }

    public function submituploadrecords(Request $request){
        //Excel::import(new SavingsImport, request()->file('savings'));

        $month = $request->month;

        $arrays = Excel::toArray(new SavingsImport, request()->file('savings'));

        $x = 0;

        $errorinserting = array();

        foreach($arrays as $array){

        	foreach($array as $arr){

        	if(isset($arr[0]) && isset($arr[1]) && isset($arr[2])){

        	

        	$sn = $arr[0];
        	$ippis = $arr[1];
        	$name = $arr[2];
        	$savings = $arr[3];
        	$normalloan = $arr[4];
        	$softloan = $arr[5];
        	$shop = $arr[6];
        	$business = $arr[7];

        	if($arr[0] != 'S/NO' && $arr[1] != 'Employee Number' && $arr[2] != 'Employee Name' && $arr[3] != 'Savings Account' && $arr[4] != 'Normal Loan Repayment' && $arr[5] != 'Soft Loan Repayment' && $arr[6] != 'Shop' && $arr[7] != 'Business'){

        		if(!empty($savings)){

        			if($this->alreadycreatedsavings($ippis, $month) == true){

	        			array_push($errorinserting, $sn);

		        	}else if(empty($ippis) || empty($name) || empty($savings) || empty($month)){

		        		array_push($errorinserting, $sn);

		        	}else if(strtolower($ippis) == 'employee number' || strtolower($name) == 'employee name' || strtolower($savings) == 'savings account'){
		        		
		        	}else{

			        	$data = array();

			        	$data['ippisnumber'] = $ippis;
			        	$data['name'] = $name;
			        	$data['amount'] = $savings;
			        	$data['month'] = $month;
			        	$data['paymentstatus'] = 'Confirmed';
			        	$data['comment'] = 'Monthly Contribution';
			        	$data['created_at'] = date('Y-m-d H:i:s');
			        	$data['updated_at'] = date('Y-m-d H:i:s');
			        	$data['updated_by'] = Auth::user()->id;

			        	$insert = DB::table('cooperativesavings')->insert($data);

			        	if($insert){
			        		$x++;
			        	}else{
			        		array_push($errorinserting, $sn);
			        	}

				        

		    		}

        		}

        		if(!empty($normalloan)){

        			if($this->alreadycreatedloan($ippis, $month, 'Normal Loan') == true){

	        			array_push($errorinserting, $sn);

		        	}else if(empty($ippis) || empty($name) || empty($normalloan) || empty($month)){

		        		array_push($errorinserting, $sn);

		        	}else if(strtolower($ippis) == 'employee number' || strtolower($name) == 'employee name' || strtolower($normalloan) == 'normal loan repayment'){
		        		
		        	}else{

		        		$loanid = $this->getloanid($ippis, 2);
		        		
		        		if(!empty($loanid)){

			        	$data = array();

			        	$data['loanid'] = $loanid;
			        	$data['ippisnumber'] = $ippis;
			        	$data['name'] = $name;
			        	$data['amount'] = $normalloan;
			        	$data['month'] = $month;
			        	$data['loantype'] = 'Normal Loan';
			        	$data['paymentstatus'] = 'Confirmed';
			        	$data['created_at'] = date('Y-m-d H:i:s');
			        	$data['updated_at'] = date('Y-m-d H:i:s');
			        	$data['updated_by'] = Auth::user()->id;

			        	$insert = DB::table('loanrepayment')->insert($data);

			        	if($insert){
			        		$x++;
			        		$updateamount = DB::table('loanrequest')
			        					->where([
			        								['ippisnumber', $ippis],
			        								['loantype', 2],
			        								['status', 'Repayment in Progress']
			        							])
			        					->increment('totalrepay', $normalloan);

			        		$updatemonth = DB::table('loanrequest')
			        					->where([
			        								['ippisnumber', $ippis],
			        								['loantype', 2],
			        								['status', 'Repayment in Progress']
			        							])
			        					->increment('monthscompleted');

			        		if($this->amountpaidsofar($ippis, 'Loans', $loanid, 'Normal Loan') >= $this->amountrequested($ippis, 'Loans', $loanid, 'Normal Loan')){

				        			$updatestatus = DB::table('loanrequest')
			        					->where([
			        								['ippisnumber', $ippis],
			        								['loantype', 2],
			        								['status', 'Repayment in Progress']
			        							])
				        					->update(['status' => 'Repaid Completely']);
				        		}
			        	}else{
			        		array_push($errorinserting, $sn);
			        	}
			        	
		        		}

		    		}
		    		
        		} 
        		if(!empty($softloan)){

        			if($this->alreadycreatedloan($ippis, $month, 'Soft Loan') == true){

	        			array_push($errorinserting, $sn);

		        	}else if(empty($ippis) || empty($name) || empty($softloan) || empty($month)){

		        		array_push($errorinserting, $sn);

		        	}else if(strtolower($ippis) == 'employee number' || strtolower($name) == 'employee name' || strtolower($softloan) == 'soft loan repayment'){
		        		
		        	}else{

		        		$loanid = $this->getloanid($ippis, 1);
		        		
		        		if(!empty($loanid)){

			        	$data = array(); 

			        	$data['loanid'] = $loanid;
			        	$data['ippisnumber'] = $ippis;
			        	$data['name'] = $name;
			        	$data['amount'] = $softloan;
			        	$data['month'] = $month;
			        	$data['loantype'] = 'Soft Loan';
			        	$data['paymentstatus'] = 'Confirmed';
			        	$data['created_at'] = date('Y-m-d H:i:s');
			        	$data['updated_at'] = date('Y-m-d H:i:s');
			        	$data['updated_by'] = Auth::user()->id;

			        	$insert = DB::table('loanrepayment')->insert($data);

			        	if($insert){
			        		$x++;
			        		$updateamount = DB::table('loanrequest')
			        					->where([
			        								['ippisnumber', $ippis],
			        								['loantype', 1],
			        								['status', 'Repayment in Progress']
			        							])
			        					->increment('totalrepay', $softloan);

			        		$updatemonth = DB::table('loanrequest')
			        					->where([
			        								['ippisnumber', $ippis],
			        								['loantype', 1],
			        								['status', 'Repayment in Progress']
			        							])
			        					->increment('monthscompleted');

			        		if($this->amountpaidsofar($ippis, 'Loans', $loanid, 'Soft Loan') >= $this->amountrequested($ippis, 'Loans', $loanid, 'Soft Loan')){

				        			$updatestatus = DB::table('loanrequest')
			        					->where([
			        								['ippisnumber', $ippis],
			        								['loantype', 1],
			        								['status', 'Repayment in Progress']
			        							])
				        					->update(['status' => 'Repaid Completely']);
				        		}

			        	}else{
			        		array_push($errorinserting, $sn);
			        	}
			        	
		        	    }

		    		}
		    		
        		}
        		
        		if(!empty($shop)){

        			if($this->alreadycreatedproduct($ippis, $month) == true){

	        			array_push($errorinserting, $sn);

		        	}else if(empty($ippis) || empty($name) || empty($shop) || empty($month)){

		        		array_push($errorinserting, $sn);

		        	}else if(strtolower($ippis) == 'employee number' || strtolower($name) == 'employee name' || strtolower($savings) == 'savings account'){

		        	}else{

		        			$productloanid = $this->productid($ippis);
		        			$accounttype = $this->getaccounttype($ippis);
		        			
		        			if(!empty($productloanid)){

				        	$data = array();

				        	$data['productloanid'] = $productloanid;
				        	$data['ippisnumber'] = $ippis;
				        	$data['name'] = $name;
				        	$data['amount'] = $shop;
				        	$data['month'] = $month;
				        	$data['paymentstatus'] = 'Confirmed';
				        	$data['accounttype'] = $accounttype;
				        	$data['created_at'] = date('Y-m-d H:i:s');
				        	$data['updated_at'] = date('Y-m-d H:i:s');
				        	$data['updated_by'] = Auth::user()->id;

				        	$insert = DB::table('productloanrepay')->insert($data);

				        	if($insert){
				        		$x++;
				        		$updateamount = DB::table('productrequest')
				        					->where([
				        								['ippisnumber', $ippis],
				        								['status', 'Repayment in Progress']
				        							])
				        					->increment('totalrepay', $shop);

				        		$updatemonth = DB::table('productrequest')
				        					->where([
				        								['ippisnumber', $ippis],
				        								['status', 'Repayment in Progress']
				        							])
				        					->increment('monthscompleted');

				        		if($this->amountpaidsofar($ippis, 'Products', $productloanid, 'Shops') >= $this->amountrequested($ippis, 'Products', $productloanid, 'Shops')){

				        			$updatestatus = DB::table('productrequest')
				        					->where([
				        								['ippisnumber', $ippis],
				        								['status', 'Repayment in Progress']
				        							])
				        					->update(['status' => 'Repaid Completely']);
				        		}

				        	}else{
				        		array_push($errorinserting, $sn);
				        	}

				        }
				        
		        	}

		        	}
		        	
		        	if(!empty($business)){

        			if($this->alreadycreatedbusiness($ippis, $month) == true){

	        			array_push($errorinserting, $sn);

		        	}else if(empty($ippis) || empty($name) || empty($business) || empty($month)){

		        		array_push($errorinserting, $sn);

		        	}else if(strtolower($ippis) == 'employee number' || strtolower($name) == 'employee name' || strtolower($savings) == 'savings account'){
		        		
		        	}else{

		        		$businessid = $this->getlbusinessid($ippis);
		        		
		        		if(!empty($businessid)){

			        	$data = array();

			        	$data['businessid'] = $businessid;
			        	$data['ippisnumber'] = $ippis;
			        	$data['name'] = $name;
			        	$data['amount'] = $business;
			        	$data['month'] = $month;
			        	$data['paymentstatus'] = 'Confirmed';
			        	$data['created_at'] = date('Y-m-d H:i:s');
			        	$data['updated_at'] = date('Y-m-d H:i:s');
			        	$data['updated_by'] = Auth::user()->id;

			        	$insert = DB::table('businessrepayment')->insert($data);

			        	if($insert){
			        		$x++;
			        		$updateamount = DB::table('businessrequest')
			        					->where('id', $businessid)
			        					->increment('totalrepay', $normalloan);

			        		$updatemonth = DB::table('businessrequest')
			        					->where('id', $businessid)
			        					->increment('monthscompleted');

			        		if($this->amountpaidsofar($ippis, 'Business', $businessid, 'Business') >= $this->amountrequested($ippis, 'Business', $businessid, 'Business')){

				        			$updatestatus = DB::table('businessrequest')
			        					    ->where('id', $businessid)
				        					->update(['status' => 'Repaid Completely']);
				        		}
			        	}else{
			        		array_push($errorinserting, $sn);
			        	}
			        	
		        		}

		    		}
		    		
        		} 

		        }

		        }
		    		
        		}

	        	
	    	}

        
        if(isset($insert)){

        	if(empty($errorinserting)){

		        return response()->json([
		        	'message' => $x.' records successfully uploaded to the database.',
		        	'class_name' => 'alert-success'
		        ]);

        	}else{

        		return response()->json([
		        	'message' => $x.' records successfully uploaded to the database, records at S/N: '.implode(', ', $errorinserting).' were not uploaded, is either they already exist or problem with the entry on the excel sheet or member has completed their payments.',
		        	'class_name' => 'alert-success'
		        ]);
        	}

    	}else{
    		return response()->json([
	        	'message' => 'Error no record was uploaded, either payments already exist for all the entries for the month provided or the number of columns in the spreadsheet are not complete.',
	        	'class_name' => 'alert-danger'
	        ]);
    	}
        
        //return redirect('/')->with('success', 'All good!');
    }
    
    
    public function legacyupload(){
        
        return view('legacyupload');
    }
    
    
    public static function accounttype($ippis){
        $checkuser = DB::table('cooperativesavings')
                    ->where('ippisnumber', $ippis)
                    ->count();
                    
        if($checkuser > 0){
            return 'Cooperative Member';
        }else{
            return 'Non-Cooperative Member';
        }
    }
    
    
    public function submituploadlegacy(){
        
        //Excel::import(new SavingsImport, request()->file('savings'));

        //$month = $request->month;

        $arrays = Excel::toArray(new LoansImport, request()->file('legacy'));

        $x = 0;
        
        $state_id = 0;
        $lga_id = 0;
        $ward_id = 0;
        
        
        $currentstate = '';
        $currentlga = '';
        $currentzone = '';
        	            

        $errorinserting = array();

        foreach($arrays as $array){

        	foreach($array as $arr){

        	if(!empty($arr[0]) && strtolower(trim($arr[0])) != 'zone'){
        	        
        	            $zone = trim($arr[0]);
        	            $state = trim($arr[1]);
        	            $lga = trim($arr[3]);
        	            $ward = trim($arr[5]);
        	            
        	            $ward_id++;
        	            
        	            if($state == $currentstate && $lga == $currentlga){
        	                $state_id = $state_id;
        	                $lga_id = $lga_id;
        	            }else if($state == $currentstate && $lga != $currentlga){
        	                $state_id = $state_id;
        	                $ward_id = 1;
        	                $lga_id++;
        	            }else if($state != $currentstate && $lga != $currentlga){
        	                $state_id++;
        	                $lga_id = 1;
        	                $ward_id = 1;
        	            }
        	            
        	            
        	            
        	            if($state_id < 10){
        	                $state_ids = '0'.$state_id;
        	            }else{
        	                $state_ids = $state_id;
        	            }
        	            if($lga_id < 10){
        	                $lga_ids = '0'.$lga_id;
        	            }else{
        	                $lga_ids = $lga_id;
        	            }
        	            if($ward_id < 10){
        	                $ward_ids = '0'.$ward_id;
        	            }else{
        	                $ward_ids = $ward_id;
        	            }
        	            
        	            $data = array();
        	            
        	            $data['zone'] = $zone;
        	            $data['state'] = $state;
        	            $data['state_id'] = $state_ids;
        	            $data['lga'] = $lga;
        	            $data['lga_id'] = $lga_ids;
        	            $data['ward'] = $ward;
        	            $data['ward_id'] = $ward_ids;
        	            
        	            $insert = DB::table('states')->insert($data);
        	            
        	            $currentstate = $state;
        	            $currentlga = $lga;
        	            $currentzone = $zone;
        	            
        	            
        	        
        	}

        	}
        
        }
    }
    
    public function legacysavingsupload(){
        
        return view('legacysavingsupload');
    }
    
    
    public static function totalsaved($ippis){
        
        return DB::table('cooperativesavings')->where('ippisnumber', $ippis)->sum('amount');
    }
    
    
    public static function monthssaved($ippis){
        
        return DB::table('cooperativesavings')->where('ippisnumber', $ippis)->count();
    }
    
    
    public function submituploadlegacysavings(Request $request){
        
        $arrays = Excel::toArray(new SavingsImport, request()->file('legacy'));

        $x = 0;

        $errorinserting = array();
        
        foreach($arrays as $array){

        	foreach($array as $arr){

        	if(isset($arr[1])){

        	if(strtolower(trim($arr[1])) != 'employee number' && !empty(trim($arr[1]))){
        	    
                	$x++;
        	        
        	        $data = array();
        	        
        	        
        	        $data['ippisnumber'] = trim($arr[1]);
        	        $data['name'] = trim($arr[2]);
        	        $data['amount'] = trim($arr[4]);
        	        $data['month'] = '2020-06';
        	        $data['paymentstatus'] = 'Confirmed';
        	        $data['comment'] = 'Opening Balance as at June, 2020';
        	        $data['created_at'] = date('Y-m-d H:i:s');
        	        $data['updated_at'] = date('Y-m-d H:i:s');
        	        $data['updated_by'] = Auth::user()->id;
        	        
        	        $insert = DB::table('cooperativesavings')->insert($data);
        	        
                	}
        	
        	    }
        	}
        }

        /*foreach($arrays as $array){

        	foreach($array as $arr){

        	if(isset($arr[0])){

        	if(strtolower(substr($arr[0], 0, 6)) == 'member' && strpos($arr[0], ':')){
        	    
        	    $names = explode(":", $arr[0]);
        	    $name = trim($names[1]);
        	}
        	
        	if(strtolower(substr($arr[0], 0, 5)) == 'ippis'){
        	    
        	    $ippises = explode(":", $arr[0]);
        	    $ippis = trim($ippises[1]);
        	    if(empty($ippis)){
        	        $ippis = trim($arr[1]);
        	    }
        	}
        	
        	
        	
        	if($arr[4] != "" && $arr[4] != 0 && $arr[4] != "-" && strtolower($arr[4]) != "credit" && !empty($arr[0])){
        	    if(isset($ippis) && !empty($ippis) && isset($name) && !empty($name) && is_numeric($arr[4])){
        	        
        	        
        	        $date = $arr[0];
        	        
        	        if(strpos($date, '/')){
        	            $date = chop($date, "'");
                	            $date = date(trim($date));
                	            $requestdate = date_format(date_create_from_format('d/m/Y', $date), 'Y-m-d H:i:s');
        	        }else{
        	            $requestdate = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date));
        	            $requestdate->toDateTimeString();
        	        }
        	        
        	        
        	        
        	        $x++;
        	        
        	        $data = array();
        	        
        	        
        	        $data['ippisnumber'] = $ippis;
        	        $data['name'] = $name;
        	        $data['amount'] = trim($arr[4]);
        	        $data['month'] = substr($requestdate, 0, 7);
        	        $data['paymentstatus'] = 'Confirmed';
        	        $data['comment'] = trim($arr[1]);
        	        $data['created_at'] = $requestdate;
        	        $data['updated_at'] = $requestdate;
        	        $data['updated_by'] = Auth::user()->id;
        	        
        	        $insert = DB::table('cooperativesavings')->insert($data);
        	        
        	    }
        	    
        	}
        	        
        	        //if($insert){ //create loan repyament
        	            
        	            if(isset($ippis) && !empty($ippis) && !empty($arr[0]) && $arr[3] != "" && $arr[3] != 0 && $arr[3] != "-" && strtolower($arr[3]) != "debit" && isset($name) && !empty($name) && is_numeric($arr[3])){
        	                
        	                
                	        $date = $arr[0];
        	        
                	        if(strpos($date, '/')){
                	            $date = chop($date, "'");
                	            $date = date(trim($date));
                	            $requestdate = date_format(date_create_from_format('d/m/Y', $date), 'Y-m-d H:i:s');
                	        }else{
                	            $requestdate = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date));
                	            $requestdate->toDateTimeString();
                	        }
                	        
        	                
        	                $paydata = array();
        	                
        	                $paydata['ippisnumber'] = $ippis;
        	                $paydata['name'] = $name;
        	                $paydata['totalsaved'] = $this->totalsaved($ippis);
        	                $paydata['monthssaved'] = $this->monthssaved($ippis);
        	                $paydata['withdrawamount'] = trim($arr[3]);
        	                $paydata['comment'] = trim($arr[1]);
        	                $paydata['withdrawstatus'] = 'Disbursed';
        	                $paydata['created_at'] = $requestdate;
        	                $paydata['updated_by'] = Auth::user()->id;
        	                
        	                $updatedata = DB::table('savingswithdrawal')->insert($paydata);
        	                
        	                
        	            }
        	            
        	        //}
        	    }
        	}

        	}*/
        
    }

    
}
