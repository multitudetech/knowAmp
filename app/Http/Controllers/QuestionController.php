<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as RouteController;

class QuestionController extends Controller
{
	public function askQuestion(){
		return view('askQuestion');
	}

	public function handleaskQuestion(Request $request){
		$this->validate($request, User::$ask_question_validation_rules);
		$data = $request->only('question_title','question_description');

		DB::table('questions')->insert([
            'question_title' => $data['question_title'],
            'question_description' => $data['question_description'],
            'user_id' => \Auth::user()->user_id
        ]);
	}

	public function listQuestions(Route $route){
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

		return view('welcome')->with('data', $data)->withErrors([$msg]);

	}

	public function detailedQuestions($question_id){
		$id = $question_id;
		for($i=0; $i<5; $i++){
			$id = base64_decode($id);
		}
		//increse view count
		DB::statement('call questionViewCount('.$id.')');
		
		//return view('detailedQuestions');
	}

}