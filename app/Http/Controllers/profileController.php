<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use DB;

use Validator;

use Auth;

use Mail;


class profileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editprofile(){

        $states = $this->states();

        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $states = $this->states();

        	return view('editprofile', ['states' => $states]);

        }
    }

    public function profile(){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

        	return view('profile');

        }
    }

    public function passwordreset(){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

    	   return view('passwordreset');

        }
    }

    public function profileupdate(Request $request){
        
            $validator = Validator::make($request->all(), [

            'name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'phoneno' => 'required',
            'whatsapp' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'gender' => 'required',
            'work' => 'required',

        ]);
        
        if($validator->passes()){

        //check email address\
        $checkemail = DB::table('users')->where([['email', $request->email], ['id', '!=', Auth::user()->id]])->count();

        if($checkemail == 1){

            return response()->json([

                'message' => 'Email address provided already in use',
                'class_name' => 'alert-danger btn-round'
                ]);
        }else{

        $data = array();

            $name = $request->name;
            $title = $request->title;
            $email = $request->email;
            $phoneno = $request->phoneno;
            $whatsapp = $request->whatsapp;
            $instagram = $request->instagram;
            $twitter = $request->twitter;
            $facebook = $request->facebook;
            $gender = $request->gender;
            $work = $request->work;



            $data['title'] = $title;
            $data['email'] = $email;
            $data['name'] = $name;
            $data['phone'] = $phoneno;
            $data['whatsapp'] = $whatsapp;
            $data['instagram'] = $instagram;
            $data['twitter'] = $twitter;
            $data['facebook'] = $facebook;
            $data['gender'] = $gender;
            $data['workplace'] = $work;
            $data['updated_by'] = Auth::user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');

        $update = DB::table('users')->where('id', Auth::user()->id)->update($data);


        if($update){
            
            return response()->json([

                'message' => 'Profile update completed successfully',
                'class_name' => 'alert-success btn-round'
            ]);

            //send email to user on successful update
            $username = Auth::user()->name;
            $useremail = Auth::user()->email;

            try{
            //send email to the person concerned
            Mail::send('emails.profileupdate', ['name' => $name, 'email' => $email], function ($message) use ($name, $email) {
            $message->to($email, $name)->subject('Your profile update was completed successfully');
            $message->from('admin@pecong.org', 'PEN');
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
        }

        }
        
        }else{

            return response()->json([

                'message' => $validator->errors()->all(),
                'class_name' => 'alert-danger btn-round'
                ]);
        }

    }


    public function passwordupdate(Request $request){

        $validator = Validator::make($request->all(), [

            'currentpassword' => 'required',
            'newpassword' => 'required',
            'newpasswordagain' => 'required'

        ]);

        if($validator->passes()){

            $currentpassword = $request->currentpassword;
            $newpassword = $request->newpassword;
            $newpasswordagain = $request->newpasswordagain;

            //$savedpassword = DB::table('users')->where('id', Auth::user()->id)->value('password');

            if(Hash::check($currentpassword, Auth::user()->password) == false){

                return response()->json([
                    'message' => 'Current password entered does not match the password to this account',
                    'class_name' => 'alert-danger'
                ]);

            }else if($newpassword != $newpasswordagain){

                return response()->json([
                    'message' => 'New password mismatch',
                    'class_name' => 'alert-danger'
                ]);

            }else if($newpassword == Auth::user()->password){

                return response()->json([
                    'message' => 'You cannot use the current password saved for this account as the new password',
                    'class_name' => 'alert-danger'
                ]);
                
            }else{

                $update = DB::table('users')
                            ->where('id', Auth::user()->id)
                            ->update([
                                        'password' => Hash::make($newpassword),
                                        'updated_by' => Auth::user()->id,
                                        'updated_at' => date('Y-m-d H:i:s')
                                    ]);

                if($update){
                    
                    return response()->json([
                        'message' => 'Password update completed successfully',
                        'class_name' => 'alert-success'
                    ]);

                    //send email to user on successful update
                    $username = Auth::user()->name;
                    $useremail = Auth::user()->email;

                    try{
                    //send email to the person concerned
                    Mail::send('emails.passwordupdate', ['name' => $name, 'email' => $email], function ($message) use ($name, $email) {
                    $message->to($email, $name)->subject('Your password update was completed successfully');
                    $message->from('admin@nigcomsatmcs.org', 'NigComSat MCS');
                    });
                    }catch(\Exception $e){
                        return response()->json([
                            'message' => 'Password update completed successfully',
                            'class_name' => 'alert-success'
                        ]);
                    }

                    return response()->json([
                        'message' => 'Password update completed successfully',
                        'class_name' => 'alert-success'
                    ]);
                }
            }
        }
    }
    
    
    public function composemessage(){
        
        return view('composemessage');
    }
    
    
    public static function sendemails($users, $title, $body, $attachment){
        
        foreach($users as $user){
                    
                    $names = $user->name;
            		$emails = $user->email;
            		$title = $title;
            		$body = $body;
            		if(!empty($attachment)){
                    $data['attachment'] = $attachment->store('assets/attachment');
                    }

    		try{
	            //send email to the person concerned
	            Mail::send('emails.emailmessage', ['names' => $names, 'emails' => $emails, 'title' => $title, 'body' => $body, 'attachment' => $attachment], function ($message) use ($names, $title, $body, $emails, $attachment) {
	            $message->from(Auth::user()->email, Auth::user()->name);
	            $message->to($emails, $names)->subject($title);
	            if(!empty($attachment)){
	            $message->attach($attachment->getRealPath(), array(
                    'as' => $attachment->getClientOriginalName(), // If you want you can chnage original name to custom name      
                    'mime' => $attachment->getMimeType())
                );
	            }
	            });
	            }catch(\Exception $e){
	               /* return response()->json([

	                'message' => 'Email sending failed',
	                'class_name' => 'alert-success btn-round'
	                ]);*/
	                return 'failed';
	            }
	            
            }
            
            return 'success';
    }
    
    public function sendmessage(Request $request){
        
        $recipient = $request->recipient;
        if(Auth::user()->role == 4){
            $recipients = 'admin@pecong.org';
        }else if($recipient == "Individual Participants"){
            $recipients = $request->email;
        }else if($recipient == "Particular State Participants"){
            $recipients = $request->states;
        }else if($recipient == "Particular LGA Participants"){
            $states = $request->states;
            $recipients = $request->lgas;
        }else{
            $recipients = $recipient;
        }
        $title = $request->title;
        $body = $request->body;
        $created_at = date('Y-m-d H:i:s');
        $attachment = $request->file('attachment');
        
        if(!empty($attachment)){
            $attachmenturl = $attachment->store('assets/attachments');
        }
        
        
        
        $data = array();
        
        $data['title'] = $title;
        $data['sender'] = Auth::user()->id;
        $data['recipient'] = $recipients;
        $data['message'] = $body;
        if(!empty($attachment)){
        $data['attachment'] = $attachmenturl;
        }
        $data['created_by'] = Auth::user()->id;
        $data['created_at'] = $created_at;
        
        $storemessage = DB::table('emails')->insert($data);
        
        if($storemessage){
            
            if(Auth::user()->role == 4){
                
                    $names = 'Admin';
            		$emails = 'admin@pecong.org';
            		$title = $title;
            		$body = $body;
            		if(!empty($attachment)){
                    $data['attachment'] = $attachmenturl;
                    }

            		try{
        	            //send email to the person concerned
        	            Mail::send('emails.emailmessage', ['names' => $names, 'emails' => $emails, 'title' => $title, 'body' => $body, 'attachment' => $attachment], function ($message) use ($names, $title, $body, $emails, $attachment) {
        	            $message->to($emails, $names)->subject($title);
        	            $message->from(Auth::user()->email, Auth::user()->name);
        	            if(!empty($attachment)){
        	            $message->attach($attachment->getRealPath(), [
                            'as' => $attachment->getClientOriginalName(), 
                            'mime' => $attachment->getMimeType()
                         ]);
        	            }
        	            });
        	            }catch(\Exception $e){
        	                /*return response()->json([
        
        	                'message' => 'Loan type created successfully',
        	                'class_name' => 'alert-success btn-round'
        	                ]);*/
        	                return response()->json([
                            'message' => 'Email sending failed',
                            'class_name' => 'alert-danger'
                        ]);
        	            }
        	            
        	           return response()->json([
                            'message' => 'Email sent successfully',
                            'class_name' => 'alert-success'
                        ]);
        	            
                        
            }else if($recipient == 'All Participants'){
                $users = DB::table('users')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $request->file('attachment'));
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
                
            }else if($recipient == 'Individual Participants'){
                
                    $names = DB::table('users')->where('email', $recipient)->value('name');
            		$emails = $recipients;
            		$title = $title;
            		$body = $body;
            		if(!empty($attachment)){
                    $data['attachment'] = $attachmenturl;
                    }
                    
                    
            		try{
        	            //send email to the person concerned
        	            Mail::send('emails.emailmessage', ['names' => $names, 'emails' => $emails, 'title' => $title, 'body' => $body, 'attachment' => $attachment], function ($message) use ($names, $title, $body, $emails, $attachment) {
        	            $message->to($emails, $names)->subject($title);
        	            $message->from(Auth::user()->email, Auth::user()->name);
        	            if(!empty($attachment)){
        	            $message->attach($attachment->getRealPath(), [
                            'as' => $attachment->getClientOriginalName(), 
                            'mime' => $attachment->getMimeType()
                         ]);
        	            }
        	            });
        	            }catch(\Exception $e){
        	                return response()->json([
        
        	                'message' => 'Email sending failed.',
        	                'class_name' => 'alert-danger btn-round'
        	                ]);
        	            }
        	            
        	           return response()->json([
                            'message' => 'Email successfully sent.',
                            'class_name' => 'alert-success'
                        ]);
        	            
                        
            }else if($recipient == 'All State Participants'){
                $users = DB::table('users')->where('membertype', 'State')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'Particular State Participants'){
                $users = DB::table('users')->where('state', $recipients)->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'All LGA Participants'){
                $users = DB::table('users')->where('membertype', 'LGA')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'Particular LGA Participants'){
                $users = DB::table('users')->where('lga', $recipients)->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'CSO'){
                $users = DB::table('users')->where('membertype', 'CSO')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'NGO'){
                $users = DB::table('users')->where('membertype', 'NGO')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'BDSP'){
                $users = DB::table('users')->where('membertype', 'BDSP')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'CBO'){
                $users = DB::table('users')->where('membertype', 'CBO')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'Advertisers'){
                $users = DB::table('users')->where('membertype', 'Advertisers')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'Sponsors'){
                $users = DB::table('users')->where('membertype', 'Sponsors')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }else if($recipient == 'Staff'){
                $users = DB::table('users')->where('membertype', 'Staff')->get();
                
                $sendemail = $this->sendemails($users, $title, $body, $attachment);
                
                if($sendemail == 'success'){
                        return response()->json([
                        'message' => 'Email Successfully Sent',
                        'class_name' => 'alert-success'
                    ]);
                }else if($sendemail == 'failed'){
                        return response()->json([
                        'message' => 'Email sending failed',
                        'class_name' => 'alert-danger'
                    ]);
                }
            }
            
        }
    }
    
    
    public function messageinbox(){
        
        if(Auth::user()->role == '1' || Auth::user()->role == '2'){
        
            $messages = DB::table('emails')
                ->where('recipient', 'All Participants')
                ->orWhere('recipient', Auth::user()->email)
                ->orWhere('recipient', 'admin@pecong.org')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                
        }else if(Auth::user()->membertype == 'Staff'){
        
            $messages = DB::table('emails')
                ->where('recipient', 'All Participants')
                ->orWhere('recipient', Auth::user()->email)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                
        }else if(Auth::user()->membertype == 'State'){
        
            $messages = DB::table('emails')
                ->where('recipient', 'All Participants')
                ->orWhere('recipient', Auth::user()->email)
                ->orWhere('recipient', Auth::user()->state)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                
        }else if(Auth::user()->membertype == 'LGA'){
        
            $messages = DB::table('emails')
                ->where('recipient', 'All Participants')
                ->orWhere('recipient', Auth::user()->email)
                ->orWhere('recipient', Auth::user()->lga)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                
        }else{
        
            $messages = DB::table('emails')
                ->where('recipient', 'All Participants')
                ->orWhere('recipient', Auth::user()->email)
                ->orWhere('recipient', Auth::user()->membertype)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                
        }
        
            return view('messageinbox', ['messages' => $messages]);
           
    }
    
    public function emaildetails(Request $request){
        
        $messages = DB::table('emails')->where('id', $request->id)->get();
        
        return view('emaildetails', ['messages' => $messages]);
    }
    
    public function sentmessages(){
        
        $messages = DB::table('emails')->where('sender', Auth::user()->id)->paginate(10);
        
        return view('sentmessages', ['messages' => $messages]);
        
    }
    
    
    public function sentmessagedetails(Request $request){
        
        $messages = DB::table('emails')->where('id', $request->id)->get();
        
        return view('sentmessagedetails', ['messages' => $messages]);
    }
}
