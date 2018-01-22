<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Mail;
use Illuminate\Routing\Route;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class IndexController extends Controller{

	public function index(){
		$title = "KnowAmp | Accelerated Mobile Pages Community Network";
		$meta_description = "We are online Q&A community for all the web designers out there. Solve AMPs query. accelerated mobile pages";

		$user_count = DB::table('users')
			->count();

		$question_count = DB::table('questions')
			->count();
		
		$views_count = DB::table('questions')
			->sum('views');
		
		$answer_count = DB::table('questions')
			->sum('answers');

		$user_count = $user_count+(100);
		$question_count = $question_count+(150);
		$answer_count = $answer_count+(150);
		$views_count = $views_count+(300);

		$data['user_count'] = $user_count;
		$data['question_count'] = $question_count;
		$data['answer_count'] = $answer_count;
		$data['views_count'] = $views_count;
		
		return view('index', compact('title', 'data', 'meta_description'));
	}

	public function privacy(){
		$title = "Privacy policy | KnowAmp";
		$meta_description = "KnowAmp Privicy policy";
		return view('privacy', compact('title', 'meta_description'));
	}

	public function terms(){
		$title = "Terms of use | KnowAmp";
		$meta_description = "KnowAmp Terms and conditions";
		return view('terms', compact('title', 'meta_description'));
	}
	
	public function contact(){
		$title = "Contact us | KnowAmp";
		$meta_description = "KnowAmp Contact us";
		return view('contact', compact('title', 'meta_description'));
	}

	public function aboutus(){
		$title = "About us | KnowAmp";
		$meta_description = "What is KnowAmp, about KnowAmp";
		return view('aboutus', compact('title', 'meta_description'));
	}

	public function handleContact(Request $request){
		//$this->validate($request, User::$handle_contact_validation_rules);

		$data = $request->only('email','query_data');

		DB::table('contactus')->insert([
            'email' => $data['email'],
            'query_data' => $data['query_data']
        ]);

        $mail_data = array();

		//send mail 
        Mail::send('emailContactUs', $mail_data, function ($message) use ($data) {

        $message->from('namaste@knowamp.com', 'KnowAmp');

        $message->to($data['email'])->subject('Query posted successfully');

		});

		$msg = "Query posted successfully!";
        session(['msg' => $msg]);
        return redirect('/contact');

	}
}