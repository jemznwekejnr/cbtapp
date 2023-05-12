<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Exports\VariationExport;
use Maatwebsite\Excel\Facades\Excel;

use DB;

use Auth;

use Mail;

use Validator;

class usersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function manageuser(Request $request){

    	$states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

        	$user = DB::table('users')->where('id', $request->user)->get();

        	$roles = DB::table('roles')->orderBy('role')->get();

        	$states = $this->states();

        	return view('manageuser', ['user' => $user, 'roles' => $roles, 'states' => $states]);

        }
    }

    public function newaccount(){

    	$states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $roles = DB::table('roles')->orderBy('role')->get();

            $users = DB::table('users')->where('accounttype', 'Non-Cooperative Member')->get();

        	return view('newaccount', ['users' => $users, 'roles' => $roles]);

        }
    }

    public function updateuseraccount(Request $request){

       
        //check email address\
        $checkemail = DB::table('users')->where([['email', $request->email], ['id', '!=', $request->recordid]])->count();

        //get user current details before update
        $userdetails = DB::table('users')->where('id', $request->recordid)->get();

        if($checkemail == 1){

            return response()->json([

                'message' => 'Email address provided already taken',
                'class_name' => 'alert-danger btn-round'
                ]);
        }else{


            $name = $request->name;
            $dob = $request->dob;
            $email = $request->email;
            $phoneno = $request->phoneno;
            $ippisnumber = $request->ippisnumber;
            $housephoneno = $request->housephoneno;
            $nationality = $request->nationality;
            $commencementdate = $request->commencementdate;
            $homeaddress = $request->homeaddress;
            $location = $request->location;
            $gender = $request->gender;
            $meansofincome = $request->meansofincome;
            $cooperativeamount = $request->cooperativeamount;
            $maritalstatus = $request->maritalstatus;
            $spousename = $request->spousename;
            $spousephoneno = $request->spousephoneno;
            $spouseemail = $request->spouseemail;
            $kinname = $request->kinname;
            $kinrelationship = $request->kinrelationship;
            $kinphoneno = $request->kinphoneno;
            $kinaddress = $request->kinaddress;
            $kinpassport = $request->kinpassport;
            $refereename = $request->refereename;
            $refereenumber = $request->refereenumber;
            $bankname = $request->bankname;
            $accountname = $request->accountname;
            $accountnumber = $request->accountnumber;
            $passport = $request->passport;
            $validid = $request->validid;
            $accounttype = $request->accounttype;
            $userrole = $request->userrole;
            $accountstatus = $request->accountstatus;


            if(!empty($kinpassport)){

            	$kinpassport = $kinpassport->store('assets/attachments');

            }else{

            	$kinpassport = $userdetails[0]->kinpassport;
            }

            if(!empty($passport)){

            	$passport = $passport->store('assets/attachments');
            }else{

            	$passport = $userdetails[0]->passport;
            }

            if(!empty($validid)){

            	$validid = $validid->store('assets/attachments');
            }else{

            	$validid = $userdetails[0]->validid;
            }



            $data = array();


            $data['email'] = $email;
            $data['name'] = $name;
            $data['nationality'] = $nationality;
            $data['dob'] = $dob;
            $data['residentialaddress'] = $homeaddress;
            $data['location'] = $location;
            $data['phonenumber'] = $phoneno;
            $data['homephone'] = $housephoneno;
            $data['ippisnumber'] = $ippisnumber;
            $data['cooperativeamount'] = $cooperativeamount;
            $data['commencementdate'] = $commencementdate;
            $data['additionalincome'] = $meansofincome;
            $data['gender'] = $gender;
            $data['passport'] = $passport;
            $data['maritalstatus'] = $maritalstatus;
            $data['spousename'] = $spousename;
            $data['spousephone'] = $spousephoneno;
            $data['spouseemail'] = $spouseemail;
            $data['kinname'] = $kinname;
            $data['kinrelationship'] = $kinrelationship;
            $data['kinphonenumber'] = $kinphoneno;
            $data['kinaddress'] = $kinaddress;
            $data['kinpassport'] = $kinpassport;
            $data['bankname'] = $bankname;
            $data['accountname'] = $accountname;
            $data['accountnumber'] = $accountnumber;
            $data['refereename'] = $refereename;
            $data['refereenumber'] = $refereenumber;
            $data['validid'] = $validid;
            $data['accounttype'] = $accounttype;
            $data['userrole'] = $userrole;
            $data['accountstatus'] = $accountstatus;


        $update = DB::table('users')->where('id', $request->recordid)->update($data);

        if($update){

            //send email to user on successful update
            $username = Auth::user()->name;
            $useremail = Auth::user()->email;

            try{
            //send email to the person concerned
            Mail::send('emails.accountupdate', ['name' => $name, 'email' => $email], function ($message) use ($name, $email) {
            $message->to($email, $name)->subject('Your profile update was completed successfully');
            $message->from('admin@nigcomsatmcs.org', 'NigComSat MCS');
            });
            }catch(\Exception $e){
                return response()->json([

                'message' => 'Profile update completed successfully',
                'class_name' => 'alert-success btn-round'
                ]);
            }


            return response()->json([

                'message' => 'Profile update completed successfully',
                'class_name' => 'alert-success btn-round'
                ]);
        }else{

        	return response()->json([

                'message' => 'No changes were apply to this account',
                'class_name' => 'alert-danger btn-round'
                ]);
        }

        }
        
       
    }


    public function users(){

    	$states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

        	$users = DB::table('users')->where('accounttype', 'Cooperative Member')->orderBy('created_at', 'desc')->get();

        	return view('users', ['users' => $users]);

        }

    }


    public function approveuser(Request $request){

    	$serialid = $request->id;

    	/*if($serialid < 10){

    		$serialid = '000'.$serialid;

    	}else if($serialid < 100){

    		$serialid = '00'.$serialid;

    	}else if($serialid < 1000){

    		$serialid = '0'.$serialid;
    	}*/

    	$update = DB::table('users')->where('id', $request->id)->update(['accountstatus' => 'Active', 'updatedby' => Auth::user()->id]);

    	if($update){
    	    
    	    $name = DB::table('users')->where('id', $request->id)->value('name');
    	    
    	    $email = DB::table('users')->where('id', $request->id)->value('email');
    	    
    	    try{
            //send email to the person concerned
            Mail::send('emails.accountactivation', ['name' => $name, 'email' => $email], function ($message) use ($name, $email) {
            $message->to($email, $name)->subject('Your account have been activated successfully');
            $message->from('admin@nigcomsatmcs.org', 'NigComSat MCS');
            });
            }catch(\Exception $e){
                return response()->json([

                'status' => 'Active'
                
                ]);
            }

    		return response()->json([
    			'status' => 'Active'
    		]);
    	}
    }


    public function createnonmemberaccount(Request $request){

    	$validator = Validator::make($request->all(), [

    		'name' => 'required',
    		'email' => 'required',
    		'phone' => 'required',
    		'accounttype' => 'required',
    		'userrole' => 'required',
    		'accountstatus' => 'required',

    	]);

    	if($validator->passes()){

    		$name = $request->name;
	    	$email = $request->email;
	    	$phone = $request->phone;
	    	$accounttype = $request->accounttype;
	    	$userrole = $request->userrole;
	    	$accountstatus = $request->accountstatus;

	    	//check if email already exist
	    	/*$emailexist = DB::table('users')->where('email', $email)->count();

	    	if($emailexist == 1){

	    		return response()->json([
	    			'message' => 'Email address provided already in use',
	    			'class-name' => 'alert_danger'
	    		]);
	    	
	    	}else{*/

	    		$password = 'nigcomsatmcs123456';

	    		$data = array();

	    		$data['name'] = $name;
	    		$data['email'] = $email;
	    		$data['password'] = Hash::make($password);
	    		$data['phonenumber'] = $phone;
	    		$data['accounttype'] = $accounttype;
	    		$data['userrole'] = $userrole;
	    		$data['accountstatus'] = $accountstatus;
                $data['updatedby'] = Auth::user()->id;

	    		//$create = DB::table('users')->insert($data);
                $create = DB::table('users')
                            ->updateOrInsert(
                                ['id' => $request->id],
                                ['name' => $name, 'email' => $email, 'password' => Hash::make($password), 'phonenumber' => $phone, 'accounttype' => $accounttype, 'userrole' => $userrole, 'accountstatus' => $accountstatus, 'updatedby' => Auth::user()->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
                            );

	    		if($create){

	    			try{
			            //send email to the person concerned
			            Mail::send('emails.newstaffaccount', ['name' => $name, 'email' => $email, 'password' => $password], function ($message) use ($name, $email, $password) {
			            $message->to($email, $name)->subject('Non member account setup NigComSat MCS Portal');
			            $message->from('admin@nigcomsatmcs.org', 'NigComSat MCS');
			            });
		            }catch(\Exception $e){
		                return response()->json([

		                'message' => 'Non-member account successfully updated',
		                'class_name' => 'alert-success btn-round'
		                ]);
		            }

	    			return response()->json([
	    				'message' => 'Non-member account successfully updated',
	    				'class_name' => 'alert-success'
	    			]);
	    		}
	    	//}
    	
    	}else{

    		return response()->json([
    			'message' => $validator->errors()->all(),
    			'class_name' => 'alert-danger'
    		]);
    	}
    }

    
    
    public function newannouncement(){
        
        return view('newannouncement');
    }
    
    public function postannouncements(Request $request){
        
        $recipient = $request->recipient;
        if($recipient == "Individual Participants"){
            $recipient = $request->email;
        }else if($recipient == "Particular State Participants"){
            $recipient = $request->states;
        }else if($recipient == "Particular LGA Participants"){
            $states = $request->states;
            $recipient = $request->lgas;
        }
        $title = $request->title;
        $body = $request->body;
        $commencedate = $request->commencedate;
        $expiredate = $request->expiredate;
        
        
        $data = array();
        
        $data['recipient'] = $recipient;
        $data['title'] = $title;
        $data['message'] = $body;
        $data['status'] = 'Active';
        $data['created_by'] = Auth::user()->id;
        $data['created_at'] = $commencedate;
        $data['updated_at'] = $expiredate;
        
        $announcement = DB::table('announcement')->insert($data);
        
        if($announcement){
            return response()->json([
                    'message' => 'Announcement successfully created',
                    'class_name' => 'alert-success'
                ]);
        }
    }
    
    
    public function previousannouncements(){
        
        return view('previousannouncements');
        
    }
    
    public function updateannouncements(Request $request){
        
        $announcement = DB::table('announcement')->where('id', $request->id)->get();
        
        return view('updateannouncements', ['announcement' => $announcement]);
    }
    
    
    
    public function updateannouncement(Request $request){
        
        $recipient = $request->recipient;
        if($recipient == "Individual Participants"){
            $recipient = $request->email;
        }else if($recipient == "Particular State Participants"){
            $recipient = $request->states;
        }else if($recipient == "Particular LGA Participants"){
            $states = $request->states;
            $recipient = $request->lgas;
        }
        $title = $request->title;
        $body = $request->body;
        $commencedate = $request->commencedate;
        $expiredate = $request->expiredate;
        $status = $request->status;
        
        if($status == 'Delete'){
            
             $announcement = DB::table('announcement')
                    ->where('id', $request->id)
                    ->limit(1)->delete();
                    
            if($announcement){
            return response()->json([
                    'message' => 'Announcement successfully deleted',
                    'class_name' => 'alert-success'
                ]);
            }        
        }
        
        
        $data = array();
        
        $data['recipient'] = $recipient;
        $data['title'] = $title;
        $data['message'] = $body;
        $data['status'] = $status;
        $data['created_by'] = Auth::user()->id;
        $data['created_at'] = $commencedate;
        $data['updated_at'] = $expiredate;
        
        $announcement = DB::table('announcement')
                    ->where('id', $request->id)->update($data);
        
        if($announcement){
            return response()->json([
                    'message' => 'Announcement successfully created',
                    'class_name' => 'alert-success'
                ]);
        }
    }
   
    
}
