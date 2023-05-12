<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Imports\SavingsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use DB;

use Validator;

use Auth;

use Mail;

class savingsController extends Controller
{
    //authenticate user
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function savingsdefined(){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

    	   return view('savingsdefined');

        }
    }

    public function savingswithdrawal(){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{
            
           $savings = DB::table('cooperativesavings')->where('ippisnumber', Auth::user()->ippisnumber)->sum('amount');
           
           $months = DB::table('cooperativesavings')->where('ippisnumber', Auth::user()->ippisnumber)->count();

    	   return view('savingswithdrawal', ['savings' => $savings, 'months' => $months]);

        }
    }

    public function savingsreport(Request $request){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $savings = DB::table('cooperativesavings')
                        ->selectRaw('*, sum(amount) as amount')
                        ->where('ippisnumber', Auth::user()->ippisnumber)
                        ->groupBy('ippisnumber')
                        ->get();

            $total = DB::table('cooperativesavings')
                        ->where('ippisnumber', Auth::user()->ippisnumber)
                        ->sum('amount');

        

	       return view('savingsreport', ['savings' => $savings, 'total' => $total]);

       }

    }



    public function savingspayments(){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $savings = DB::table('cooperativesavings')
                            ->where('ippisnumber', Auth::user()->ippisnumber)
                            ->get();

                $total = DB::table('cooperativesavings')
                            ->where('ippisnumber', Auth::user()->ippisnumber)
                            ->sum('amount');

            

            return view('savingspayments', ['savings' => $savings, 'total' => $total]);

        }

    }



    public function adminsavingsreport(){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $savings = DB::table('cooperativesavings')
                            ->selectRaw('*, sum(amount) as amount')
                            ->groupBy('ippisnumber')
                            ->get();

            $total = DB::table('cooperativesavings')
                            ->sum('amount');

            return view('adminsavingsreport', ['savings' => $savings, 'total' => $total]);

        }
    }


    public function adminsavingspayments(){

        $states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

            $savings = DB::table('cooperativesavings')
                        ->get();

            $total = DB::table('cooperativesavings')
                        ->sum('amount');

        

            return view('savingspayments', ['savings' => $savings, 'total' => $total]);

        }

    }
    
    public function submitwithdrawal(Request $request){
        
        $validator = Validator::make($request->all(), [
                'ippis' => 'required',
                'name' => 'required',
                'savings' => 'required',
                'months' => 'required',
                'requestedamount' => 'required',
            ]);
            
        if($validator->passes()){
            
            $ippis = $request->ippis;
            $name = $request->name;
            $savings = $request->savings;
            $months = $request->months;
            $requestedamount = $request->requestedamount;
            $comment = $request->comment;
            $status = $request->status;
            
            $data = array();
            
            $data['ippisnumber'] = $ippis;
            $data['name'] = $name;
            $data['totalsaved'] = $savings;
            $data['monthssaved'] = $months;
            $data['withdrawamount'] = $requestedamount;
            $data['comment'] = $comment;
            $data['withdrawstatus'] = $status;
            $data['created_at'] = date('Y-m-d H:i:s');
            
            $withdraw = DB::table('savingswithdrawal')->insert($data);
            
            if($withdraw){
                return response()->json([
                    'message' => 'Savings withdrawal successfully created',
                    'class_name' => 'alert-success'
                ]);
            }
            
        }else{
            return response()->json([
                    'message' => $validator->errors()->all(),
                    'class_name' => 'alert-danger'
                ]);
        }
    }
    
    
    public function withdrawalview(){
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{
            
            $withdraws = DB::table('savingswithdrawal')
                    ->where('ippisnumber', Auth::user()->ippisnumber)
                    ->get();
                    
            $total = DB::table('savingswithdrawal')
                    ->where('ippisnumber', Auth::user()->ippisnumber)
                    ->sum('withdrawamount');
                    
            return view('withdrawalview', ['withdraws' => $withdraws, 'total' => $total]);
            
        }
    }
    
    
    public function adminwithdrawalview(){
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{
            
            $withdraws = DB::table('savingswithdrawal')
                    ->get();
                    
            $total = DB::table('savingswithdrawal')
                    ->sum('withdrawamount');
                    
            return view('adminwithdrawalview', ['withdraws' => $withdraws, 'total' => $total]);
            
        }
    }
    
    
    public function adminwithdtrawalupdate(Request $request){
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{
            
            $withdraws = DB::table('savingswithdrawal')
                    ->where('id', $request->withdraw)
                    ->get();
                    
            return view('adminwithdtrawalupdate', ['withdraws' => $withdraws]);
            
        }
    }
    
    
    public function updatewithdrawal(Request $request){
        
        $validator = Validator::make($request->all(), [
                'ippis' => 'required',
                'name' => 'required',
                'savings' => 'required',
                'months' => 'required',
                'requestedamount' => 'required',
            ]);
            
        if($validator->passes()){
            
            $ippis = $request->ippis;
            $name = $request->name;
            $savings = $request->savings;
            $months = $request->months;
            $requestedamount = $request->requestedamount;
            $comment = $request->comment;
            $status = $request->status;
            
            $data = array();
            
            $data['ippisnumber'] = $ippis;
            $data['name'] = $name;
            $data['totalsaved'] = $savings;
            $data['monthssaved'] = $months;
            $data['withdrawamount'] = $requestedamount;
            $data['comment'] = $comment;
            $data['withdrawstatus'] = $status;
            $data['created_at'] = date('Y-m-d H:i:s');
            
            $withdraw = DB::table('savingswithdrawal')
                    ->where('id', $request->id)
                    ->update($data);
            
            if($withdraw){
                return response()->json([
                    'message' => 'Savings withdrawal successfully updated',
                    'class_name' => 'alert-success'
                ]);
            }
            
        }else{
            return response()->json([
                    'message' => $validator->errors()->all(),
                    'class_name' => 'alert-danger'
                ]);
        }
        
    }
    
    
    public function retrievewithdrawal(Request $request){
        
        $name = DB::table('users')
                    ->where('ippisnumber', $request->ippis)
                    ->value('name');
                    
        $savings = DB::table('cooperativesavings')
                    ->where('ippisnumber', $request->ippis)
                    ->sum('amount');
                    
        $months = DB::table('cooperativesavings')
                    ->where('ippisnumber', $request->ippis)
                    ->count();
                    
        return response()->json([
                'name' => $name,
                'savings' => $savings,
                'months' => $months
            ]);
    }
    
}
