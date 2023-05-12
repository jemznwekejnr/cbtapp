<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use DB;

use Auth;

class rolesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function roles(){

    	$states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

	    	$roles = DB::table('roles')->get();

	    	return view('roles', ['roles' => $roles]);

	    }
    }

    public function submitrole(Request $request){

    	$validator = Validator::make($request->all(), [

    		'role' => 'required'

    	]);

    	if($validator->passes()){

    		$newrecord = DB::table('roles')
    						->updateOrInsert(
						        ['id' => $request->id],
						        ['role' => $request->role, 'created_by' => Auth::user()->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
						    );

			if($newrecord){

				return response()->json([
	    			'message' => 'Role updated successfully',
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

    public function fetchrole(Request $request){

    	$roles = DB::table('roles')->where('id', $request->id)->get();

    	return response()->json([
    		'role' => $roles[0]->role,
    		'id' => $roles[0]->id
    	]);
    }

    public function deleterole(Request $request){

    	$delete = DB::table('roles')->where('id', $request->id)->limit(1)->delete();

    	if($delete){

    		return response()->json([
	    		'status' => 'success'
	    	]);

    	}else{

    		return response()->json([
	    		'status' => 'failed'
	    	]);
    	}

    	

    }


    public function actions(){

    	$states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

	    	$actions = DB::table('actions')->get();

	    	return view('actions', ['actions' => $actions]);

	    }
    }

    public function submitaction(Request $request){

    	$validator = Validator::make($request->all(), [

    		'action' => 'required'

    	]);

    	if($validator->passes()){

    		$processes = array('View', 'Create', 'Edit', 'Delete');

    		foreach($processes as $process){

    			$newrecord = DB::table('actions')
    						->updateOrInsert(
						        ['id' => $request->id],
						        ['process' => $request->action, 'actions' => $process, 'created_by' => Auth::user()->id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
						    );

    		}

    		

			if($newrecord){

				return response()->json([
	    			'message' => 'Action updated successfully',
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

    public function fetchaction(Request $request){

    	$actions = DB::table('actions')->where('id', $request->id)->get();

    	return response()->json([
    		'action' => $actions[0]->actions,
    		'id' => $actions[0]->id
    	]);
    }

    public function deleteaction(Request $request){

    	$delete = DB::table('actions')->where('id', $request->id)->limit(1)->delete();

    	if($delete){

    		return response()->json([
	    		'status' => 'success'
	    	]);

    	}else{

    		return response()->json([
	    		'status' => 'failed'
	    	]);
    	}

    	

    }


    public function roleprevileges(Request $request){

    	$states = $this->states();
        
        if($this->useractive() != 'Active'){

            $initialmessage = 'Please contact admin to activate your account.';

            return view('profile', ['initialmessage' => $initialmessage]);

        }else if($this->userprofile() == 'Update Required'){

            $initialmessage = 'Complete the update of your profile ro proceed.';

            return view('editprofile', ['states' => $states, 'initialmessage' => $initialmessage]);

        }else{

	    	$roles = DB::table('roles')->orderBy('role', 'asc')->get();

	    	$actions = DB::table('actions')->orderBy('process', 'asc')->get();

	    	if(isset($request->role)){

	    		$setaction = DB::table('roles_actions')->where('role', $request->role)->get();

	    		//dump($setactions);

	    		$setactions = array();

	    		foreach($setaction as $newset){

	    			array_push($setactions, $newset->action);
	    		}

	    		return view('roleprevileges', ['roles' => $roles, 'actions' => $actions, 'setrole' => $request->role, 'setactions' => $setactions]);

	    	}else{

	    		return view('roleprevileges', ['roles' => $roles, 'actions' => $actions]);

	    	}

	    }

    	
    }


    public function submitprivilege(Request $request){

    	$validator = Validator::make($request->all(), [

    		'role' => 'required'

    	]);


    	if($validator->passes()){

    		//delete all the previleges on this role
    		$delete = DB::table('roles_actions')->where('role', $request->role)->delete();

    		$counter = count($request->newaction);
    		//dd($request->newaction[79]);
    		//create new actions for this role
    		for($i=0; $i<$counter; $i++){

    			$data = array();

    			$data['role'] = $request->role;
    			$data['action'] = $request->newaction[$i];
    			$data['created_by'] = Auth::user()->id;
    			$data['created_at'] = date('Y-m-d H:i:s');

    			$create = DB::table('roles_actions')->insert($data);

    		}

    		if($create){

    			return response()->json([

    				'message' => 'Role previleges created successfully',
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
}
