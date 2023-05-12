<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;

use PDF;

use Mail;

class testController extends Controller
{
    //

    public function Instructions(){

    	return view('instructions');
    }

    public function testPage(){

    	return view('testpage');
    }

    public function Result(){

    	return view('result');
    }

    public function resultDetails(Request $request){

    	$tests = DB::table('testquestions')
    				->where('test_id', $request->test_id)
    				->get();
    				
    	$test_result = DB::table('usertest')->where('test_id', $request->test_id)->get();

    	return view('resultdetails')->with(['test_result' => $test_result, 'tests' => $tests]);

    }

    public function welcome(){

    	$subjects = DB::table('questions')->groupBy('subject')->get();

    	$years = DB::table('questions')->groupBy('year')->get();

    	$exams = DB::table('questions')->groupBy('exam_type')->get();

    	return view('welcome')->with(['subjects' => $subjects, 'years' => $years, 'exams' => $exams]);
    }

    public function starttest(Request $request){
        
        $checkuser = DB::table('usertest')
                        ->where([
                                    ['name', $request->name],
                                    ['email', $request->email],
                                    ['status', 'Started']
                                ])->count();
                                
        if($checkuser > 0){
            $thisuser = DB::table('usertest')
                        ->where([
                                    ['name', $request->name],
                                    ['email', $request->email],
                                    ['status', 'Started']
                                ])->get();
            $updateresult = DB::table('usertest')
				->where('test_id', $thisuser[0]->test_id)
				->update(['status' => 'Suspended',
				         'total_score' => 0,
						 'user_score' => 0,
						 'user_percentage' => 0,
						 'updated_at' => date('Y-m-d H:i:s')
						]);

    	$subjects = DB::table('questions')->groupBy('subject')->get();

    	$years = DB::table('questions')->groupBy('year')->get();

    	$exams = DB::table('questions')->groupBy('exam_type')->get();

    	return view('welcome')->with(['subjects' => $subjects, 'years' => $years, 'exams' => $exams]);
        }

    	if(isset(Auth::user()->id)){
    		$user = Auth::user()->id;
    		$name = Auth::user()->name;
    	}else{
    		$user = NULL;
    		$name = $request->name;
    	}

    	$email = $request->email;
    	$organization = $request->organization;
    	$designation = $request->designation;
    	
    	$examtype = $request->examtype;
    	$subject = $request->subject;
    	$year = $request->year;
    	$date = date('Y-m-d H:i:s');

    	$data = array();

    	$data['user'] = $user;
    	$data['name'] = $name;
    	$data['email'] = $email;
    	$data['organization'] = $organization;
    	$data['designation'] = $designation;
    	$data['exam_type'] = $examtype;
    	$data['subject'] = $subject;
    	$data['year'] = $year;
    	$data['status'] = 'Started';
    	$data['created_at'] = $date;

    	$registertest = DB::table('usertest')->insert($data);

    	$test_id = DB::table('usertest')
    					->where([
    								['name', $name], 
    								['exam_type', $examtype],
    								['subject', $subject], 
    								['year', $year], 
    								['created_at', $date]
    							])
    					->value('test_id');

    	$questions = DB::table('questions')
    					->where([['exam_type', $examtype], ['subject', $subject], ['year', $year]])
    					->inRandomOrder()
    					->get();

    	return view('testpage')->with(['questions' => $questions, 'name' => $name, 'subject' => $subject, 'year' => $year, 'examtype' => $examtype, 'test_id' => $test_id]);
    }

    
    public static function compareanswer($question_id, $useranswer){

    	$result = DB::table('questions')
    				->where('id', $question_id)
    				->value('correctanswer');

    	if($result == $useranswer){

    		$status = 1;
    	
    	}else{

    		$status = 0;
    	}

    	return $status;
    }


    public function submitCbt(Request $request){
        
        $checkresult = DB::table('usertest')
    					->where('test_id', $request->test_id)
    					->value('updated_at');
    					
    	if(!empty($checkresult)){
    	    
    	    $averagetime = number_format(($request->timetaken ?? 40 / $total) * 60, 2);
    	    
    	    $test_result = DB::table('usertest')->where('test_id', $request->test_id)->get();

    	    return view('result')->with(['test_result' => $test_result, 'averagetime' => $averagetime]);
    	    
    	}else{

    	$date = date('Y-m-d H:i:s');
    	
    	for($i=0; $i<70; $i++){

    		$questionid = 'question_id'.$i;

    		$answer = 'number'.$i;

    		if(isset($request->$questionid)){

	    		$data = array();

	    		$data['test_id'] = $request->test_id;
	    		$data['question_id'] = $request->$questionid;
	    		$data['useranswer'] = $request->$answer;
	    		$data['status'] = $this->compareanswer($request->$questionid, $request->$answer);
	    		$data['created_at'] = $date;

	    		$insert = DB::table('testquestions')->insert($data);

    		}
    	}

    	$score = DB::table('testquestions')
    				->where([
								['test_id', $request->test_id],
								['status', 1]
    						])
    				->count();

    	$total = DB::table('testquestions')
    				->where('test_id', $request->test_id)
    				->count();

    	$averagetime = number_format(($request->timetaken / $total) * 60, 2);

    	$percentage = number_format(($score / $total) * 100, 2);

    	$updateresult = DB::table('usertest')
    					->where('test_id', $request->test_id)
    					->update(['status' => 'Completed',
    					         'total_score' => $total,
    							 'user_score' => $score,
    							 'user_percentage' => $percentage,
    							 'updated_at' => date('Y-m-d H:i:s')
    							]);

    	$test_result = DB::table('usertest')->where('test_id', $request->test_id)->get();

    	return view('result')->with(['test_result' => $test_result, 'averagetime' => $averagetime]);
    	
    	}
    }


    public static function getQuestion($id){

    	$question = DB::table('questions')
    				->where('id', $id)
    				->get();


    	if($question[0]->questiontype == 'Text Only'){

    		return $question[0]->textquestion;

    	}else if($question[0]->questiontype == 'Image Only'){

    		return '<img src="'.$question[0]->imagequestion.'">';

    	}else if($question[0]->questiontype == 'Text and Image'){

    		return $question[0]->textquestion.'<br /><img src="'.$question[0]->imagequestion.'">';

    	}
    }

    public static function userName($id){

    	$name = DB::table('usertest')
    				->where('test_id', $id)
    				->value('name');


    	return $name;
    }


    public static function testSubject($id){

    	$subject = DB::table('usertest')
    				->where('test_id', $id)
    				->value('subject');


    	return $subject;
    }


    public static function examType($id){

    	$examtype = DB::table('usertest')
    				->where('test_id', $id)
    				->value('exam_type');


    	return $examtype;
    }


    public static function testYear($id){

    	$year = DB::table('usertest')
    				->where('test_id', $id)
    				->value('year');


    	return $year;
    }

    public static function totalQuestions($id){

    	$total = DB::table('testquestions')
    				->where('test_id', $id)
    				->count();


    	return $total;

    }



    public static function getOption1($id){

    	$option1 = DB::table('questions')
    				->where('id', $id)
    				->get();


    	if($option1[0]->option1type == 'Text Only'){

    		return $option1[0]->option1text;

    	}else if($option1[0]->option1type == 'Image Only'){

    		return '<img src="'.$option1[0]->option1image.'">';

    	}else if($option1[0]->option1type == 'Text and Image'){

    		return $option1[0]->option1text.'<br /><img src="'.$option1[0]->option1image.'">';

    	}
    }


    public static function getOption2($id){

    	$option2 = DB::table('questions')
    				->where('id', $id)
    				->get();


    	if($option2[0]->option2type == 'Text Only'){

    		return $option2[0]->option2text;

    	}else if($option2[0]->option2type == 'Image Only'){

    		return '<img src="'.$option2[0]->option2image.'">';

    	}else if($option2[0]->option2type == 'Text and Image'){

    		return $option2[0]->option2text.'<br /><img src="'.$option2[0]->option2image.'">';

    	}
    }


    public static function getOption3($id){

    	$option3 = DB::table('questions')
    				->where('id', $id)
    				->get();


    	if($option3[0]->option3type == 'Text Only'){

    		return $option3[0]->option3text;

    	}else if($option3[0]->option3type == 'Image Only'){

    		return '<img src="'.$option3[0]->option3image.'">';

    	}else if($option3[0]->option3type == 'Text and Image'){

    		return $option3[0]->option3text.'<br /><img src="'.$option3[0]->option3image.'">';

    	}
    }


    public static function getOption4($id){

    	$option4 = DB::table('questions')
    				->where('id', $id)
    				->get();


    	if($option4[0]->option4type == 'Text Only'){

    		return $option4[0]->option4text;

    	}else if($option4[0]->option4type == 'Image Only'){

    		return '<img src="'.$option4[0]->option4image.'">';

    	}else if($option4[0]->option4type == 'Text and Image'){

    		return $option4[0]->option4text.'<br /><img src="'.$option4[0]->option4image.'">';

    	}
    }


    public static function userAnswer($test, $id){

    	$result = DB::table('testquestions')
    				->where([
    							['test_id', $test],
    							['question_id', $id]
    						])

    				->value('useranswer');

    	return $result;
    }



    public static function correctAnswer($id){

    	$result = DB::table('questions')
    				->where('id', $id)
    				->value('correctanswer');

    	return $result;
    }
    
    
    public function checkusertest(Request $request){
        
        $check = DB::table('usertest')
                    ->where('email', $request->email)->count();
                            
        if($check > 0){
            return response()->json([
                'message' => 'found',
                ]);
        }else{
            return response()->json([
                'message' => 'notfound',
                ]);
        }
    }
    
    
    public function downloadpdf(Request $request){
        
        $tests = DB::table('testquestions')
    				->where('test_id', $request->result)
    				->get();
    				
    	$test_result = DB::table('usertest')->where('test_id', $request->result)->get();
        
        $pdf = PDF::loadView('pdfresult', ['tests' => $tests, 'test_result' => $test_result]);
        
        return $pdf->download('AML_CFT_Test_Result.pdf');
    }
    
    
    public function emailresult(Request $request){
        
        $tests = DB::table('testquestions')
    				->where('test_id', $request->result)
    				->get();
    				
    	$test_result = DB::table('usertest')->where('test_id', $request->result)->get();
        
        $pdf = PDF::loadView('pdfresult', ['tests' => $tests, 'test_result' => $test_result]);
        
        $name = $test_result[0]->name;
        $email = $test_result[0]->email;
        
        try{
            Mail::send('emails.resultemail', ['name' => $name, 'email' => $email], function ($message) use ($name, $email, $pdf) {
                    $message->to($email, $name)
                    ->subject('Test result from your AndJemz Tech ICT training')
                    ->attachData($pdf->output(), "AML_CFT_Test_Result.pdf");
                    $message->from('cbt@andjemztech.com', 'AndJemz Tech CBT Result');
            });
            
        }catch(\Exception $e){
            $message = 'Error! Sending Email Please Try Again.';
        }
        
        if (Mail::failures()) {
            // return response showing failed emails
            $message = 'Error! Sending Email Please Try Again.';
        }else{
            $message = 'Email Sending Completed Succesfully.';
        }
        
        
        return view('resultdetails', ['tests' => $tests, 'test_result' => $test_result, 'message' => $message]);
    }
    
    
    public function adminemailresult(Request $request){
        
        $tests = DB::table('testquestions')
    				->where('test_id', $request->result)
    				->get();
    				
    	$test_result = DB::table('usertest')->where('test_id', $request->result)->get();
        
        $pdf = PDF::loadView('pdfresult', ['tests' => $tests, 'test_result' => $test_result]);
        
        $name = 'Admin';
        $email = 'cbt@counterfraudcenter.org';
        
        try{
            Mail::send('emails.adminresultemail', ['name' => $name, 'email' => $email, 'tests' => $tests], function ($message) use ($name, $email, $tests, $pdf) {
                    $message->to($email, $name)
                    ->subject('Test result of '.$tests[0]->name.' at AML/CFT training conducted by Counter Fraud Center')
                    ->attachData($pdf->output(), "AML_CFT_Test_Result.pdf");
            });
            
        }catch(\Exception $e){
            $message = 'Error! Sending Email Please Try Again.';
        }
        
        if (Mail::failures()) {
            // return response showing failed emails
            $message = 'Error! Sending Email Please Try Again.';
        }else{
            $message = 'Email Sending Completed Succesfully.';
        }
        
        
        return view('resultdetails', ['tests' => $tests, 'test_result' => $test_result, 'message' => $message]);
        
        
    }
    
}
