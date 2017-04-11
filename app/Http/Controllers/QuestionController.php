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
		$title = "Ask your question | KnowAmp";
		$meta_description = "Ask question about AMPs. query regarding accelerated mobile pages ask on KnowAmp. we are here for providing plateform for amps designers";
		return view('askQuestion', compact('title', 'meta_description'));
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

        $message->from('namaste@knowamp.com', 'KnowAmp');

        $message->to(\Auth::user()->email)->subject('Question posted successfully');

		});
        $title = 'KnowAmp | Most asked AMPs questions';
        $msg = 'Question posted successfully!';
        session(['msg' => $msg]);

        $data = DB::table('questions')
			->join('users','questions.user_id', '=', 'users.user_id')
			->select('questions.id', 'questions.user_id', 'questions.question_title', 'questions.question_description', 'questions.views', 'users.name', 'questions.answers', 'questions.audit_created')
			->limit(10)
			->orderBy('views', 'desc')
			->get();
        
		return view('welcome', compact('title'))->with('data', $data);		
	}

	public function listQuestions(Route $route){
		$title = 'Most asked AMPs questions | KnowAmp';
		$currentPath= RouteController::getFacadeRoot()->current()->uri();

		if($currentPath=='login'){
			$title = 'Login | KnowAmp';
			$msg = 'Please login before ask question';
		}
		else{
			$msg="";
		}
		session(['msg' => $msg]);
		$data = DB::table('questions')
			->join('users','questions.user_id', '=', 'users.user_id')
			->select('questions.id', 'questions.user_id', 'questions.question_title', 'questions.question_description', 'questions.views', 'users.name', 'questions.answers', 'questions.audit_created')
			->limit(10)
			->orderBy('views', 'desc')
			->get();

		$meta_description = "Questions regarding AMPs (Accelerated Mobile Pages). ".$data[0]->question_title;

		return view('welcome', compact('title', 'meta_description'))->with('data', $data);

	}

	public function detailedQuestions($question_id){
		$id = $question_id;
		for($i=0; $i<5; $i++){
			$id = base64_decode($id);
		}
		$id = str_replace('\'','',$id);
		$id = str_replace('"','',$id);
		//increse view count
		DB::statement('call questionViewCount('.$id.')');

		$data = DB::table('questions')
			->join('users','questions.user_id', '=', 'users.user_id')
			->leftjoin('answers', 'answers.questions_id', '=', 'questions.id')
			->select('questions.id AS question_id', 'questions.question_title', 'questions.question_description', 'questions.views', 'questions.rate', 'users.name', 'questions.answers', 'questions.audit_created AS question_created_date', 'answers.id', 'answers.answer', 'answers.rate AS answer_rate', 'answers.audit_created AS answer_created_date')
			->where('questions.id', '=', $id)
			->get();

		$title = $data[0]->question_title.' | KnowAmp';
		$meta_description = $data[0]->question_title." ".$data[0]->question_description;
		
		return view('detailedQuestions', compact('title', 'meta_description'))->with('data', $data);
	}

	public function incApplyRate($question_id){
		$question_id = str_replace('\'','',$question_id);
		$question_id = str_replace('"','',$question_id);
		DB::statement('call applyQuestionRates('.$question_id.',1)');

		return "Voted successfully!";
	}

	public function decApplyRate($question_id){
		$question_id = str_replace('\'','',$question_id);
		$question_id = str_replace('"','',$question_id);
		DB::statement('call applyQuestionRates('.$question_id.',-1)');

		return "Voted successfully!";
	}

}