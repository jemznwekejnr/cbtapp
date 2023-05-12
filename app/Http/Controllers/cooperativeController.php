<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class cooperativeController extends Controller
{
    //

    public function cooperativerepay(){

    	return view('cooperativerepay');
    }
    
    public function submitcontact(Request $request){
        
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $messages = $request->message;
        
        try{
            //send email to the person concerned
            Mail::send('emails.contact', ['name' => $name, 'email' => $email, 'subject' => $subject, 'messages' => $messages], function ($message) use ($name, $email, $subject, $messages) {
            $message->to('nigcomsatmcs@gmail.com', 'NigComsat MCS')->subject($subject);
            $message->from($email, $name);
            });
            }catch(\Exception $e){
                return response()->json([

                'message' => 'Message successfully sent!',
                'class_name' => 'alert-success btn-round'
                ]);
            }


            return response()->json([

                'message' => 'Message successfully sent!',
                'class_name' => 'alert-success btn-round'
                ]);
    }
}
