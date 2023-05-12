<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use DB;
use Mail;

class zoneController extends Controller
{
    //
    
    public function zonestates(Request $request){
        
        $states = DB::table('states')
                ->where('zone', $request->zone)
                ->groupBy('state')
                ->get();
        
        return response()->json([
                'states' => $states
            ]);
    }
    
    
    public function stateslga(Request $request){
        
        $lgas = DB::table('states')
                ->where('state', $request->states)
                ->groupBy('lga')
                ->get();
        
        return response()->json([
                'lgas' => $lgas
            ]);
    }
    
    
    public function lgaward(Request $request){
        
        $wards = DB::table('states')
                ->where('lga', $request->lgas)
                ->get();
        
        return response()->json([
                'wards' => $wards
            ]);
    }
    
    
    public static function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
    public function submitpayment(Request $request){
        
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $participant = $request->participant;
        $geozone = $request->geozone;
        $states = $request->states;
        $lgas = $request->lgas;
        $noofparticipants = $request->noofparticipants;
        $amountpay = $request->amountpay;
        $paymentmethod = $request->paymentmethod;
        $proof = $request->file('proof');
        $cardpayproof = $request->cardpayproof;
        
        if($participant == 'State' && empty($states)){
            
            return response()->json([
                    'message' => "Please select state to proceed.",
                    'class_name' => 'alert-danger'
                ]);
        }else if(($participant == 'LGA') && (empty($states) || empty($lgas))){
            
            return response()->json([
                    'message' => "Please select LGA to proceed.",
                    'class_name' => 'alert-danger'
                ]);
        }
        
        
        if($paymentmethod == "Manual Payment" && empty($proof)){
            return response()->json([
                    'message' => "Please upload proof of payment to proceed.",
                    'class_name' => 'alert-danger'
                ]);
        }else if($paymentmethod == "Card Payment" && empty($cardpayproof)){
            return response()->json([
                    'message' => "Please complete payment to proceed.",
                    'class_name' => 'alert-danger'
                ]);
        }
        
        
        $checkemail = DB::table('users')->where('email', $email)->count();
        
        $checkemails = DB::table('payments')->where('email', $email)->count();
        
        if($checkemail == 1 || $checkemails == 1){
            return response()->json([
                    'message' => "Email address provided already in use.",
                    'class_name' => 'alert-danger'
                ]);
        }
        
        
        $data = array();
        
        $data['name'] = $name;
        $data['email'] = $email;
        $data['phone'] = $phone;
        $data['participationtype'] = $participant;
        $data['totalparticipant'] = $noofparticipants;
        if($participant == 'State'){
            $data['zone'] = $geozone;
            $data['state'] = $states;
        }else if($participant == 'LGA'){
            $data['zone'] = $geozone;
            $data['state'] = $states;
            $data['lga'] = $lgas;
        }
        $data['amountpaid'] = $amountpay;
        $data['paymentmethod'] = $paymentmethod;
        if($paymentmethod == "Manual Payment"){
            $proofurl = $proof->store('assets/attachments');
            $data['paymentproof'] = $proofurl;
            $data['paymentstatus'] = 'Pending Confirmation';
            $data['created_at'] = date('Y-m-d H:i:s');
        }else if($paymentmethod == "Card Payment"){
            $data['paymentproof'] = $cardpayproof;
            $data['paymentstatus'] = "Confirm";
            $data['updated_by'] = "Paystack";
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
        }
        
        $payments = DB::table('payments')->insert($data);
        
        if($payments){ //send email to admin
        
            $names = 'Admin';
    		$emails = 'admin@pecong.org';
    		$users = $name;
    		$amounts = $amountpay;

    		try{
	            //send email to the person concerned
	            Mail::send('emails.adminpayment', ['names' => $names, 'users' => $users, 'amounts' => $amounts], function ($message) use ($names, $users, $amounts, $emails) {
	            $message->to($emails, $names)->subject('New Participant Payment for Partnership Economy Nigeria Summit.');
	            $message->from('admin@pecong.org', 'PEN');
	            });
	            }catch(\Exception $e){
	                /*return response()->json([

	                'message' => 'Loan type created successfully',
	                'class_name' => 'alert-success btn-round'
	                ]);*/
	            }
	            
	       /*********** Admin Email Ends Here ********************************/
	       
	       /*********** If payment is confirmed do this **********************/
	       
	       if($paymentmethod == "Card Payment"){
	           
	           $password = $this->randomPassword();
	           $passwordencrypt = Hash::make($password);
	           
	           
	           $userdata = array();
	           
	           $userdata['name'] = $name;
	           $userdata['email'] = $email;
	           $userdata['password'] = $passwordencrypt;
	           $userdata['phone'] = $phone;
	           $userdata['role'] = 4;
	           $userdata['status'] = 'Active';
	           $userdata['created_at'] = date('Y-m-d H:i:s');
	           
	           $newuser = DB::table('users')->insertGetId($userdata);
	           
	           if($newuser){
	               DB::table('users')
	                    ->where('email', $email)
	                    ->update(['created_by' => $newuser]);
	                    
	               $newusername = $name;
	               $newuseremail = $email;
	               $newuserpassword = $password;
	               $noofparticipants = $noofparticipants;
	               $amountpay = $amountpay;
	                    
                    try{
    	            //send confirmed payment email to user
    	            Mail::send('emails.confirmedpayment', ['newusername' => $newusername, 'newuseremail' => $newuseremail, 'newuserpassword' => $newuserpassword, 'noofparticipants' => $noofparticipants, 'amountpay' => $amountpay], function ($message) use ($newusername, $newuseremail, $newuserpassword, $noofparticipants, $amountpay) {
    	            $message->to($newuseremail, $newusername)->subject('Your Participation Fee for Partnership Economy Nigeria Summit has been Confirmed.');
    	            $message->from('admin@pecong.org', 'PEN');
    	            });
    	            }catch(\Exception $e){
    	                return response()->json([
    
    	                'message' => 'Payment successfully completed, please log in to the portal with Email: '.$email.' and Password: '.$password.' to complete registration.',
    	                'class_name' => 'alert-success btn-round'
    	                ]);
    	            }
    	            
    	            return response()->json([
    
    	                'message' => 'Payment successfully completed, please log in to the portal with Email: '.$email.' and Password: '.$password.' to complete registration.',
    	                'class_name' => 'alert-success btn-round'
    	                ]);
	           }
	           
	       }else if($paymentmethod == "Manual Payment"){
	           
	           $newusername = $name;
               $newuseremail = $email;
               $noofparticipants = $noofparticipants;
               $amountpay = $amountpay;
	           
	           //try{
    	            //send confirmed payment email to user
    	            Mail::send('emails.unconfirmedpayment', ['newusername' => $newusername, 'newuseremail' => $newuseremail, 'noofparticipants' => $noofparticipants, 'amountpay' => $amountpay], function ($message) use ($newusername, $newuseremail, $noofparticipants, $amountpay) {
    	            $message->to($newuseremail, $newusername)->subject('Your Participation Fee for Partnership Economy Nigeria Summit has been Submitted and Pending Confirmation.');
    	            $message->from('admin@pecong.org', 'PEN');
    	            });
    	           /* }catch(\Exception $e){
    	                return response()->json([
    
    	                'message' => 'Payment successfully submitted and pending confirmation, you will be notified via email once your payment is confirmed with your log in details.',
    	                'class_name' => 'alert-success btn-round'
    	                ]);
    	            }*/
    	            
	            return response()->json([
    
                    'message' => 'Payment successfully submitted and pending confirmation, you will be notified via email once your payment is confirmed with your log in details.',
                    'class_name' => 'alert-success btn-round'
                    ]);
	       }
            
        }
    }
    
    public function verifytag(Request $request){
        
        $user = DB::table('users')->where('id', $request->user)->get();
        
        if($user->count() == 1){
            return view('verifytag', ['user' => $user]);
        }else{
            return view('verifytag', ['nouser' => 'no user']);
        }
        
        
    }
}
