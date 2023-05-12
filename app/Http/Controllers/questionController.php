<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class questionController extends Controller
{
    //authenticate user
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addQuestions(){

    	return view ('addquestions');
    }


    public function submitQuestion(Request $request){

    	$examtype = $request->examtype;
    	$subject = $request->subject;
    	$year = $request->year;
    	$questiontype = $request->questiontype;

    	if($questiontype == 'Text Only'){ //store only text question

    		$question1 = $request->textquestion;
    		$question2 = NULL;

    	}else if($questiontype == 'Image Only'){ //store only image question

    		$attachmenturl = $request->imagequestion;	
    		$question1 = $attachmenturl->store('assets/img');
    		$question2 = NULL;

    	}else if($questiontype == 'Text and Image'){ //store only image question

    		$question1 = $request->textimagequestion;
    		$attachmenturl = $request->imagetextquestion;	
    		$question2 = $attachmenturl->store('assets/img');

    	}


    	$option1type = $request->option1type;

    	if($option1type == 'Text Only'){ //store only text question

    		$option1 = $request->option1text;
    		$option11 = NULL;

    	}else if($option1type == 'Image Only'){ //store only image question

    		$attachmenturl = $request->option1image;	
    		$option1 = $attachmenturl->store('assets/img');
    		$option11 = NULL;

    	}else if($option1type == 'Text and Image'){ //store only image question

    		$option1 = $request->option1textimage;
    		$attachmenturl = $request->option1imagetext;	
    		$option11 = $attachmenturl->store('assets/img');	

    	}



    	$option2type = $request->option2type;

    	if($option2type == 'Text Only'){ //store only text question

    		$option2 = $request->option2text;
    		$option22 = NULL;

    	}else if($option2type == 'Image Only'){ //store only image question

    		$attachmenturl = $request->option2image;	
    		$option2 = $attachmenturl->store('assets/img');
    		$option22 = NULL;

    	}else if($option2type == 'Text and Image'){ //store only image question

    		$option2 = $request->option2textimage;
    		$attachmenturl = $request->option2imagetext;	
    		$option22 = $attachmenturl->store('assets/img');	

    	}

        
        if(isset($request->option3text) && !empty($request->option3text)){

    	$option3type = $request->option3type;

    	if($option3type == 'Text Only'){ //store only text question

    		$option3 = $request->option3text;
    		$option33 = NULL;

    	}else if($option3type == 'Image Only'){ //store only image question

    		$attachmenturl = $request->option3image;	
    		$option3 = $attachmenturl->store('assets/img');
    		$option33 = NULL;

    	}else if($option3type == 'Text and Image'){ //store only image question

    		$option3 = $request->option3textimage;
    		$attachmenturl = $request->option3imagetext;	
    		$option33 = $attachmenturl->store('assets/img');	

    	}

        }else{
            
            $option3type = NULL;
            $option3 = NULL;
    		$option33 = NULL;
        }
        
        
        if(isset($request->option4text) && !empty($request->option4text)){

    	$option4type = $request->option4type;

    	if($option4type == 'Text Only'){ //store only text question

    		$option4 = $request->option4text;
    		$option44 = NULL;

    	}else if($option4type == 'Image Only'){ //store only image question

    		$attachmenturl = $request->option4image;	
    		$option4 = $attachmenturl->store('assets/img');
    		$option44 = NULL;

    	}else if($option3type == 'Text and Image'){ //store only image question

    		$option4 = $request->option4textimage;
    		$attachmenturl = $request->option4imagetext;	
    		$option44 = $attachmenturl->store('assets/img');	

    	}

        }else{
            
            $option4type = NULL;
            $option4 = NULL;
    		$option44 = NULL;
        }

    	
    	if(isset($request->passage) && !empty($request->passage)){

    		$passage = $request->passage;
    	
    	}else{

    		$passage = NULL;
    	}

    	

    	$correctanswer = $request->correctanswer;



    	$data = array();

    	$data['exam_type'] = $examtype;
    	$data['subject'] = $subject;
    	$data['year'] = $year;
    	$data['passage'] = $passage;
    	$data['questiontype'] = $questiontype;
    	$data['textquestion'] = $question1;
    	$data['imagequestion'] = $question2;
    	$data['option1type'] = $option1type;
    	$data['option1text'] = $option1;
    	$data['option1image'] = $option11;
    	$data['option2type'] = $option1type;
    	$data['option2text'] = $option2;
    	$data['option2image'] = $option22;
    	$data['option3type'] = $option3type;
    	$data['option3text'] = $option3;
    	$data['option3image'] = $option33;
    	$data['option4type'] = $option4type;
    	$data['option4text'] = $option4;
    	$data['option4image'] = $option44;
    	$data['correctanswer'] = $correctanswer;
    	$data['added_by'] = Auth::user()->id;
    	$data['created_at'] = date('Y-m-d H:i:s');


    	$insert = DB::table('questions')
    				->insert($data);


    	if($insert){

    		return response()->json([

    			'message' => 'Question added successfully',
    			'class_name' => 'alert-success'

    		]);
    	}



    }


    public function newaccount(){

    	return view('newaccount');
    }

    public function previoustest(){

    	if(Auth::user()->account_type == 'Candidate'){

    		$tests = DB::table('usertest')->where('user', Auth::user()->id)->orderBy('created_at', 'desc')->get();

    	}else{

    		$tests = DB::table('usertest')->orderBy('created_at', 'desc')->get();
    	}

    	return view('previoustest')->with(['tests' => $tests]);
    }

    public function createaccount(Request $request){

    	$name = $request->name;
    	$email = $request->email;
    	$accounttype = $request->accounttype;
    	$password = 'cbt123456';

    	$data = array();

    	$data['name'] = $name;
    	$data['email'] = $email;
    	$data['account_type'] = $accounttype;
    	$data['account_status'] = 'Active';
    	$data['password'] = Hash::make($password);
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['created_by'] = Auth::user()->email;

    	$create = DB::table('users')->insert($data);

    	if($create){

    		return response()->json([

    			'message' => 'New account created successfully | Username: '.$email.' | Password: '.$password,
    			'class_name' => 'alert-success'

    		]);
    	}
    }


    public function users(){

    	$users = DB::table('users')->orderBy('created_at', 'desc')->get();

    	return view('users')->with(['users' => $users]);
    }

    public function manageuser(Request $request){

    	$user = DB::table('users')->where('id', $request->id)->get();

    	return view('manageuser')->with(['user' => $user]);
    }


public function updateaccount(Request $request){

	$name = $request->name;
	$accountstatus = $request->accountstatus;
	$accounttype = $request->accounttype;

	$data = array();

	$data['name'] = $name;
	$data['account_type'] = $accounttype;
	$data['account_status'] = $accountstatus;
	$data['updated_by'] = Auth::user()->email;
	$data['updated_at'] = date('Y-m-d H:i:s');


	$update = DB::table('users')->where('id', $request->id)->update($data);

	if($update){

		return response()->json([
			'message' => 'User account successfully updated',
			'class_name' => 'alert-success'
		]);
	}
}


public function passwordreset(){

	return view('passwordreset');
}


public function updatepassword(Request $request){

	$currentpassword = $request->currentpassword;
	$newpassword = $request->newpassword;
	$newpasswordagain = $request->newpasswordagain;

	$dbpassword = DB::table('users')->where('id', $request->id)->value('password');

	
	if(Hash::check($currentpassword, $dbpassword)){
		//password matches
		if($newpassword == $newpasswordagain){ //password matches

			$data = array();

			$data['password'] = Hash::make($newpassword);
			$data['updated_by'] = Auth::user()->email;
			$data['updated_at'] = date('Y-m-d H:i:s');

			$update = DB::table('users')->where('id', $request->id)->update($data);

			if($update){

				return response()->json([

				'message' => 'Password successfully updated',
				'class_name' => 'alert-success'

				]);
			}

		}else{

			return response()->json([

			'message' => 'The new password provided does not match',
			'class_name' => 'alert-danger'

			]);

		}

	}else{

		return response()->json([

			'message' => 'Current password provided does not match this user password in the database',
			'class_name' => 'alert-danger'

		]);
	}
}


}