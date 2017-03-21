<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Mail;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as RouteController;

class QuestionController extends Controller
{
	public function askQuestion(){
		$title = "knowAmp | Ask your question";
		return view('askQuestion')->with('title', $title);
	}

	public function handleaskQuestion(Request $request){
		$this->validate($request, User::$ask_question_validation_rules);
		$data = $request->only('question_title','question_description');

		DB::table('questions')->insert([
            'question_title' => $data['question_title'],
            'question_description' => $data['question_description'],
            'user_id' => \Auth::user()->user_id
        ]);

        $send_email = \Auth::user()->email;

        $mail_data = array(
            'question_title' => $data['question_title'],
            'question_description' => $data['question_description']
        );            

        //send mail 
        Mail::send('emailAskedQuestion', $mail_data, function ($message) use ($data) {

        $message->from('knowampinfo@gmail.com', 'knowAmp');

        $message->to(\Auth::user()->email)->subject('Question posted successfully');

		});
        $title = 'knowAmp | Most asked AMPs questions';
        $msg = 'Question posted successfully!';

        $data = DB::table('questions')
			->join('users','questions.user_id', '=', 'users.user_id')
			->select('questions.id', 'questions.user_id', 'questions.question_title', 'questions.question_description', 'questions.views', 'users.name', 'questions.answers', 'questions.audit_created')
			->limit(10)
			->orderBy('views', 'desc')
			->get();
        
		return view('welcome', compact('title'))->with('data', $data)->withErrors([$msg]);		
	}

	public function listQuestions(Route $route){
		$title = 'knowAmp | Most asked AMPs questions';
		$currentPath= RouteController::getFacadeRoot()->current()->uri();

		if($currentPath=='login'){
			$msg = 'Please login before ask question';
		}
		else{
			$msg="";
		}

		$data = DB::table('questions')
			->join('users','questions.user_id', '=', 'users.user_id')
			->select('questions.id', 'questions.user_id', 'questions.question_title', 'questions.question_description', 'questions.views', 'users.name', 'questions.answers', 'questions.audit_created')
			->limit(10)
			->orderBy('views', 'desc')
			->get();

		return view('welcome', compact('title'))->with('data', $data)->withErrors([$msg]);

	}

	public function detailedQuestions($question_id){
		$id = $question_id;
		for($i=0; $i<5; $i++){
			$id = base64_decode($id);
		}
		//increse view count
		DB::statement('call questionViewCount('.$id.')');

		$data = DB::table('questions')
			->join('users','questions.user_id', '=', 'users.user_id')
			->leftjoin('answers', 'answers.questions_id', '=', 'questions.id')
			->select('questions.id AS question_id', 'questions.question_title', 'questions.question_description', 'questions.views', 'users.name', 'questions.answers', 'questions.audit_created AS question_created_date', 'answers.id', 'answers.answer', 'answers.audit_created AS answer_created_date')
			->where('questions.id', '=', $id)
			->get();

		$title = 'knowAmp | '.$data[0]->question_title;
		
		return view('detailedQuestions', compact('title'))->with('data', $data);
	}

}