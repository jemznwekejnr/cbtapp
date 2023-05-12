<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use DB;
use Auth;
use Mail;
use Validator;
use QrCode;
use PDF;

class paymentController extends Controller
{
    //authenticate user
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    //retrieve payments page
    public function payments(){
        
        $payments = DB::table('payments')
                    ->orderBy('paymentstatus', 'desc')
                    ->paginate(10);
        $participants = DB::table('payments')->sum('totalparticipant');
        $totalpayments = DB::table('payments')->sum('amountpaid');
        
        return view('payments', ['payments' => $payments, 'participants' => $participants, 'totalpayments' => $totalpayments]);
    }
    
    
    //retrive the requested payment information
    public function paymentdetails(Request $request){
        
        $payments = DB::table('payments')
                ->where('id', $request->payment)
                ->get();
                
        return view('paymentdetails', ['payments' => $payments]);
    }
    
    //generate password for user
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
    
    //update payment status
    public function updatepayment(Request $request){
        
        $id = $request->id;
        $paymentstatus = $request->paymentstatus;
        
        $update = DB::table('payments')
                ->where('id', $id)
                ->update(['paymentstatus' => $paymentstatus, 'updated_by' => Auth::user()->id, 'updated_at' => date('Y-m-d H:i:s')]);
                
        if($update){
            
            if($paymentstatus == 'Confirmed'){ //generate password and register user
            
                
                 $password = $this->randomPassword();
                 $passwordhash = Hash::make($password);
                 
                 $users = DB::table('payments')->where('id', $id)->get();
                 
                 //check if user currently exist
                 $checkuser = DB::table('users')
                        ->where('email', $users[0]->email)
                        ->count();
                        
                if($checkuser == 0){
                 
                 $data = array();
                 
                 $data['name'] = $users[0]->name;
                 $data['email'] = $users[0]->email;
                 $data['password'] = $passwordhash;
                 $data['phone'] = $users[0]->phone;
                 $data['role'] = 4;
                 $data['status'] = 'Active';
                 $data['created_by'] = $id;
                 $data['updated_by'] = Auth::user()->id;
                 $data['created_at'] = date('Y-m-d H:i:s');
                 $data['updated_at'] = date('Y-m-d H:i:s');
                 
                 $newuser = DB::table('users')->insert($data);
                 
                 if($newuser){ //send email to the user
                     
                   $newusername = $users[0]->name;
	               $newuseremail = $users[0]->email;
	               $newuserpassword = $password;
	               $noofparticipants = $users[0]->totalparticipant;
	               $amountpay = $users[0]->amountpaid;
	                    
                    try{
    	            //send confirmed payment email to user
    	            Mail::send('emails.confirmedpayment', ['newusername' => $newusername, 'newuseremail' => $newuseremail, 'newuserpassword' => $newuserpassword, 'noofparticipants' => $noofparticipants, 'amountpay' => $amountpay], function ($message) use ($newusername, $newuseremail, $newuserpassword, $noofparticipants, $amountpay) {
    	            $message->to($newuseremail, $newusername)->subject('Your Participation Fee for Partnership Economy Nigeria Summit has been Confirmed.');
    	            $message->from('admin@pecong.org', 'PEN');
    	            });
    	            }catch(\Exception $e){
    	                return response()->json([
    
    	                'message' => 'Payment successfully confirmed, user can now log in to the portal with Email: '.$newuseremail.' and Password: '.$password.' to complete registration.',
    	                'class_name' => 'alert-success btn-round'
    	                ]);
    	            }
    	            
    	            return response()->json([
    
    	                'message' => 'Payment successfully confirmed, user can now log in to the portal with Email: '.$newuseremail.' and Password: '.$password.' to complete registration.',
    	                'class_name' => 'alert-success btn-round'
    	                ]);
	                }
	                
                    }else{
                        return response()->json([
    
    	                'message' => 'Payment successfully confirmed, user can now log in to the portal with Email: '.$users[0]->email.' and Password: '.$password.' to complete registration.',
    	                'class_name' => 'alert-success btn-round'
    	                ]);
                    }
                 }else if($paymentstatus == 'Pending Confirmation'){//remove user from the list of users
                 
                    return response()->json([
    
    	                'message' => 'Payment successfully updated to pending confirmation.',
    	                'class_name' => 'alert-success btn-round'
    	                ]);
                     
                }else if($paymentstatus == 'Declined'){//remove user from the list of users
                 
                    $delete = DB::table('payments')
                        ->where('id', $id)
                        ->limit(1)
                        ->delete();
                     
                }
        }
    }
    
    
    public function newparticipant(){
        
        $users = DB::table('users')
                ->where('created_by', Auth::user()->id)
                ->get();
        
        return view('newparticipant', ['users' => $users]);
    }
    
    
    public function submitparticipant(Request $request){
        
        $title = $request->title;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $facebook = $request->facebook;
        $instagram = $request->instagram;
        $twitter = $request->twitter;
        $whatsapp = $request->whatsapp;
        $participant = $request->participant;
        if($participant == 'State'){
            $geozone = $request->geozone;
            $states = $request->states;
        }else if($participant == 'LGA'){
            $geozone = $request->geozone;
            $states = $request->states;
            $lgas = $request->lgas;
            $wards = $request->wards;
            
            if($wards == 'NOT HERE?'){
                $wards = $request->specifyward;
            }
        }
        $gender = $request->gender;
        $work = $request->work;
        
        
        $password = $this->randomPassword();
        $passwordhash = Hash::make($password);
        
        if($participant == 'LGA'){//check the last registered LG
        
            $lastid = DB::table('users')
                        ->where([
                                    ['state', $states],
                                    ['lga', $lgas],
                                    ['ward', $wards]
                                ])
                        ->orderBy('id', 'desc')
                        ->limit(1)
                        ->get();
                        
            if($lastid->count() == 0){
                $st = $this->statecode($states);
                $lg = $this->lgacode($states, $lgas);
                $wd = $this->wardcode($states, $lgas, $wards);
                $memberid = 'LG'.$st.$lg.$wd.'01';
            }else if($lastid->count() > 0){
                
                $id = intval(substr($lastid[0]->membershipid, 8, 2));
                $id++;
                if($id < 10){
                    $id = '00'.$id;
                }else if($id < 100){
                    $id = '0'.$id;
                }
                $st = $this->statecode($states);
                $lg = $this->lgacode($states, $lgas);
                $wd = $this->wardcode($states, $lgas, $wards);
                $memberid = 'LG'.$st.$lg.$wd.$id;
            }
            
        }else if($participant == 'State'){//check the last registered LG
        
            $lastid = DB::table('users')
                        ->where('state', $states)
                        ->orderBy('id', 'desc')
                        ->limit(1)
                        ->get();
                        
            if($lastid->count() == 0){
                $st = $this->statecode($states);
                $memberid = 'ST'.$st.'001';
            }else if($lastid->count() > 0){
                
                $id = intval(substr($lastid[0]->membershipid, 4, 3));
                $id++;
                if($id < 10){
                    $id = '00'.$id;
                }else if($id < 100){
                    $id = '0'.$id;
                }
                $st = $this->statecode($states);
                $memberid = 'ST'.$st.$id;
            }
            
        }else if($participant == 'BDSP'){//check the last registered LG
        
            $lastid = DB::table('users')
                        ->where('membertype', $participant)
                        ->orderBy('id', 'desc')
                        ->limit(1)
                        ->get();
                        
            if($lastid->count() == 0){
                
                $memberid = 'BD'.'001';
            }else if($lastid->count() > 0){
                
                $id = intval(substr($lastid[0]->membershipid, 2, 3));
                $id++;
                if($id < 10){
                    $id = '00'.$id;
                }else if($id < 100){
                    $id = '0'.$id;
                }
                
                $memberid = 'BD'.$id;
            }
            
        }else if($participant == 'CSO'){//check the last registered LG
        
            $lastid = DB::table('users')
                        ->where('membertype', $participant)
                        ->orderBy('id', 'desc')
                        ->limit(1)
                        ->get();
                        
            if($lastid->count() == 0){
                
                $memberid = 'CS'.'001';
            }else if($lastid->count() > 0){
                
                $id = intval(substr($lastid[0]->membershipid, 2, 3));
                $id++;
                if($id < 10){
                    $id = '00'.$id;
                }else if($id < 100){
                    $id = '0'.$id;
                }
                
                $memberid = 'CS'.$id;
            }
            
        }else if($participant == 'NGO'){//check the last registered LG
        
            $lastid = DB::table('users')
                        ->where('membertype', $participant)
                        ->orderBy('id', 'desc')
                        ->limit(1)
                        ->get();
                        
            if($lastid->count() == 0){
                
                $memberid = 'NG'.'001';
            }else if($lastid->count() > 0){
                
                $id = intval(substr($lastid[0]->membershipid, 2, 3));
                $id++;
                if($id < 10){
                    $id = '00'.$id;
                }else if($id < 100){
                    $id = '0'.$id;
                }
                
                $memberid = 'NG'.$id;
            }
            
        }else if($participant == 'CBO'){//check the last registered LG
        
            $lastid = DB::table('users')
                        ->where('membertype', $participant)
                        ->orderBy('id', 'desc')
                        ->limit(1)
                        ->get();
                        
            if($lastid->count() == 0){
                
                $memberid = 'CB'.'001';
            }else if($lastid->count() > 0){
                
                $id = intval(substr($lastid[0]->membershipid, 2, 3));
                $id++;
                if($id < 10){
                    $id = '00'.$id;
                }else if($id < 100){
                    $id = '0'.$id;
                }
                
                $memberid = 'CB'.$id;
            }
            
        }else if($participant == 'Advertiser'){//check the last registered LG
        
            $lastid = DB::table('users')
                        ->where('membertype', $participant)
                        ->orderBy('id', 'desc')
                        ->limit(1)
                        ->get();
                        
            if($lastid->count() == 0){
                
                $memberid = 'AD'.'001';
            }else if($lastid->count() > 0){
                
                $id = intval(substr($lastid[0]->membershipid, 2, 3));
                $id++;
                if($id < 10){
                    $id = '00'.$id;
                }else if($id < 100){
                    $id = '0'.$id;
                }
                
                $memberid = 'AD'.$id;
            }
            
        }else if($participant == 'Sponsor'){//check the last registered LG
        
            $lastid = DB::table('users')
                        ->where('membertype', $participant)
                        ->orderBy('id', 'desc')
                        ->limit(1)
                        ->get();
                        
            if($lastid->count() == 0){
                
                $memberid = 'SP'.'001';
            }else if($lastid->count() > 0){
                
                $id = intval(substr($lastid[0]->membershipid, 2, 3));
                $id++;
                if($id < 10){
                    $id = '00'.$id;
                }else if($id < 100){
                    $id = '0'.$id;
                }
                
                $memberid = 'SP'.$id;
            }
            
        }else if($participant == 'Staff'){//check the last registered LG
        
            $lastid = DB::table('users')
                        ->where('membertype', $participant)
                        ->orderBy('id', 'desc')
                        ->limit(1)
                        ->get();
                        
            if($lastid->count() == 0){
                
                $memberid = 'PEN'.'001';
            }else if($lastid->count() > 0){
                
                $id = intval(substr($lastid[0]->membershipid, 3, 3));
                $id++;
                if($id < 10){
                    $id = '00'.$id;
                }else if($id < 100){
                    $id = '0'.$id;
                }
                
                $memberid = 'PEN'.$id;
            }
            
        }
        
        
        $data = array();
        
        //check if user already exist
        $checkuser = DB::table('users')->where('email', $email)->get();
        
        if($checkuser->count() == 1){
            $data['membershipid'] = $checkuser[0]->membershipid;
            $data['title'] = $title;
            $data['name'] = $name;
            $data['gender'] = $gender;
            $data['phone'] = $phone;
            $data['facebook'] = $facebook;
            $data['instagram'] = $instagram;
            $data['twitter'] = $twitter;
            $data['whatsapp'] = $whatsapp;
            $data['membertype'] = $participant;
            if($participant == 'State'){
                $data['zone'] = $geozone;
                $data['state'] = $states;
            }elseif($participant == 'LGA'){
                $data['zone'] = $geozone;
                $data['state'] = $states;
                $data['lga'] = $lgas;
                $data['ward'] = $wards;
            }
            $data['workplace'] = $work;
            $data['status'] = 'Active';
            $data['created_by'] = Auth::user()->id;
            $data['created_at'] = date('Y-m-d H:i:s');
            
            $user = DB::table('users')->where('email', $email)->update($data);
            
            return response()->json([
                        'message' => 'Participant created successfully',
                        'class_name' => 'alert-success'
                    ]);
            
        }else{
            
            $data['membershipid'] = $memberid;
            $data['title'] = $title;
            $data['name'] = $name;
            $data['email'] = $email;
            $data['password'] = $passwordhash;
            $data['gender'] = $gender;
            $data['phone'] = $phone;
            $data['facebook'] = $facebook;
            $data['instagram'] = $instagram;
            $data['twitter'] = $twitter;
            $data['whatsapp'] = $whatsapp;
            $data['membertype'] = $participant;
            if($participant == 'State'){
                $data['zone'] = $geozone;
                $data['state'] = $states;
            }elseif($participant == 'LGA'){
                $data['zone'] = $geozone;
                $data['state'] = $states;
                $data['lga'] = $lgas;
                $data['ward'] = $wards;
            }
            $data['workplace'] = $work;
            $data['role'] = 4;
            $data['status'] = 'Active';
            $data['created_by'] = Auth::user()->id;
            $data['created_at'] = date('Y-m-d H:i:s');
            
            $user = DB::table('users')->insertGetId($data);
            
            if($user){//generate user PDF with QR Code
            
                $qrcode = QrCode::size(100)
                     ->backgroundColor(255,55,0)
                     ->generate('https://pecong.org/pen/verifytag='.$user);
            
                $pdf = PDF::loadView('emails.summittag', ['title' => $title, 'name' => $name, 'memberid' => $memberid, 'qrcode' => $qrcode, 'participant' => $participant]);
                
                //send email to registered user
                
                try{
                Mail::send('emails.regconfirm', ['memberid' => $memberid, 'title' => $title, 'name' => $name, 'email' => $email, 'password' => $password, 'pdf' => $pdf], function ($message) use ($memberid, $title, $name, $email, $password, $pdf) {
                    $message->to($email, $name)
                    ->subject('Successful Participant Account Registration for the Partnership Economy Summit Abuja 2020.');
                    /*->attachData($pdf->output(), "participant_tag.pdf");*/
                    $message->from('admin@pecong.org', 'PEN');
                    });
                }catch(JWTException $exception){
                    $this->serverstatuscode = "0";
                    $this->serverstatusdes = $exception->getMessage();
                }
                if (Mail::failures()) {
                     $this->statusdesc  =   "Participant Created But Error sending mail";
                     $this->statuscode  =   "0";
        
                }else{
        
                   $this->statusdesc  =   "Participant Created and Message sent Succesfully";
                   $this->statuscode  =   "1";
                }
                return response()->json([
                        'message' => compact('this'),
                        'class_name' => 'alert-success'
                    ]);
                    
                }
                
            }
           
    }

    public function summittag(){
        $x = Auth::user()->id;
        $title = Auth::user()->title;
        $name = Auth::user()->name;
        $memberid = Auth::user()->membershipid;
        $participant = Auth::user()->membertype;
        $qrcode = QrCode::size(100)
                     ->backgroundColor(255,55,0)
                     ->generate('https://pecong.org/pen/verifytag?user='.$x);
        return view('emails.summittag', ['title' => $title, 'name' => $name, 'memberid' => $memberid, 'qrcode' => $qrcode, 'participant' => $participant]);
    }
    
    
    public function myparticipants(Request $request){
        
        $users = DB::table('users')
                ->where('created_by', Auth::user()->id)
                ->get();
        
        return view('process.myparticipants', ['users' => $users]);
    }
    
    
    public function adminnewparticipant(){
        
        return view('adminnewparticipant');
    }
    
    
    public function registeredparticipants(){
        
        $users = DB::table('users')
                ->get();
        
        return view('registeredparticipants', ['users' => $users]);
    }
    
    public function participantdetails(Request $request){
        
        $user = DB::table('users')->where('id', $request->user)->get();
        
        return view('participantdetails', ['user' => $user]);
        
    }
    
    
    public function updateparticipant(Request $request){
        
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $title = $request->title;
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $whatsapp = $request->whatsapp;
        $gender = $request->gender;
        $participant = $request->participant;
        if($participant == 'State'){
            $geozone = $request->geozone;
            $states = $request->states;
        }else if($participant == 'LGA'){
            $geozone = $request->geozone;
            $states = $request->states;
            $lgas = $request->lgas;
            $wards = $request->wards;
        }
        $work = $request->work;
        $role = $request->role;
        $status = $request->status;
        $updatedby = Auth::user()->id;
        $updatedat = date('Y-m-d H:i:s');
        
        
        //check email
        $checkemail = DB::table('users')->where([['email', $email], ['id', '!=', $id]])->count();
        
        if($checkemail == 1){
            return response()->json([
                    'message' => 'Email address provided already used by a different participant',
                    'class_name' => 'alert-danger'
                ]);
        }
        
        if($status == 'Delete'){
            
            $delete = DB::table('users')->where('id', $id)->limit(1)->delete();
            
            if($delete){
               return respons()->json([
                        'message' => 'deleted'
                   ]); 
            }
        }
        
        $data = array();
        
        
        $data['title'] = $title;
        $data['name'] = $name;
        $data['email'] = $email;
        $data['phone'] = $phone;
        $data['whatsapp'] = $whatsapp;
        $data['instagram'] = $instagram;
        $data['facebook'] = $facebook;
        $data['twitter'] = $twitter;
        $data['gender'] = $gender;
        $data['membertype'] = $participant;
        if($participant == 'State'){
            $data['zone'] = $geozone;
            $data['state'] = $states;
        }else if($participant == 'LGA'){
            $data['zone'] = $geozone;
            $data['state'] = $states;
            $data['lga'] = $lgas;
            $data['ward'] = $wards;
        }
        $data['workplace'] = $work;
        $data['role'] = $role;
        $data['status'] = $status;
        $data['updated_by'] = $updatedby;
        $data['updated_at'] = $updatedat;
        
        $update = DB::table('users')->where('id', $id)->update($data);
        
        if($update){
            
            return response()->json([
                    'message' => 'Participant details successfully updated',
                    'class_name' => 'alert-success'
                ]);
        }
        
        
    }
    
    public function myparticipantdetails(Request $request){
        
        $user = DB::table('users')->where([['id', $request->user], ['created_by', Auth::user()->id]])->get();
        
        if($user->count() == 0){
            $users = DB::table('users')
                ->where('created_by', Auth::user()->id)
                ->get();
        
            return view('newparticipant', ['users' => $users]);
        }else{
            return view('myparticipantdetails', ['user' => $user]);
        }
        
    }

}
