<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
//use App\Http\Controllers\Mail;
use Mail;
use DB;
use Storage;

class UsersController extends Controller
{
	public function signup(){
		$title = "KnowAmp | SignUp";
		return view('signup', compact('title'));
	}

	public function store(Request $request)
    {   
    	$msg = '';             
        $this->validate($request, User::$create_validation_rules);
        $data = $request->only('user_id','name', 'nickname', 'email', 'contact_number', 'password', 'date', 'verification_code');
        $confirm_password = $request->only('confirm_password');

        if($data['password']==$confirm_password['confirm_password']){
	        //generate user_id     
	        $usr_string = str_random(3);
	        $characters = 'qwertyuioplkjhgfdsazxcvbnm';

	        // generate a pin based on 2 * 1 digits + a random character
	        $usr_pin = mt_rand(1, 9)
	        . mt_rand(1, 9)
	        . $characters[rand(0, strlen($characters) - 1)];
	        
	        $data['user_id'] = str_shuffle($usr_pin).md5(date('Y-m-d H:i:s:u'));

	        //generating verification_code
	        $string = str_random(15);
	        //generate pin
	        $pin = mt_rand(10000, 99999)
	        . mt_rand(10000, 99999)
	        . $characters[rand(0, strlen($characters) - 1)]
	        . $characters[rand(0, strlen($characters) - 1)]
	        . $characters[rand(0, strlen($characters) - 1)]
	        . $characters[rand(0, strlen($characters) - 1)]
	        . $characters[rand(0, strlen($characters) - 1)];

	        $data['verification_code'] = str_shuffle($pin);


	        $data['password'] = bcrypt($data['password']);        
	        $user = User::create($data);
	         
	        if($user){
	            //send verification email
	            $mail_data = array(
	                'verify' => "verify",
	                'user_id' => $data['user_id'],
	                'verification_code' => $data['verification_code'],
	                'email' => $data['email']
	            );            

	            Mail::send('emailverify', $mail_data, function ($message) use ($data) {

	            $message->from('knowampinfo@gmail.com', 'knowAmp');

	            $message->to($data['email'])->subject('Verify knowAmp Account');

	    		});

	            $msg = 'We have send you verification email please verify it';
	          	return redirect()->route('login')->withErrors([$msg]);
	        }
    	}
    	else{
    		$msg = 'Password and confirm password does\'t match' ;
    	}

        return back()->withErrors([$msg, 'The Message'])->withInput();
    }

    //verify email and user
    public function verify($userid, $verifyid){
        //get verification code from database
        $verification_code = DB::table('users')
        ->where('user_id', $userid)
        ->value('verification_code');
        //Check verified value 0 to 1 in database
        if($verification_code==$verifyid){
            //Change verified value 0 to 1 in database
            DB::table('users')
            ->where('user_id', $userid)
            ->update(['verified' => 1]);

            $msg = "User verified successfull";
            //redirect to the login page
            return redirect('/');
        }
        else{
        	$msg = "User doesn't verified";
        }
    }
}