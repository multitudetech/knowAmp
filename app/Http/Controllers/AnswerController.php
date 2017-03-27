<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Mail;
use Illuminate\Routing\Route;

class AnswerController extends Controller{
	public function handleAnswer(Request $request){
		$this->validate($request, User::$answer_validate_rules);
		$data = $request->only('question_id','answer_description');
		
		$question_id = $data['question_id'];
		$id = $question_id;
		for($i=0; $i<5; $i++){
			$id = base64_decode($id);
		}
		$exist = DB::table('questions')
			->select('questions.id')
			->where('questions.id', '=', $id)
			->get();
		if(count($exist)=='1'){
			DB::table('answers')->insert([
	            'questions_id' => $id,
	            'answerby_user_id' => \Auth::user()->user_id,
	            'answer' => $data['answer_description'],
	            'success' => '0'
	        ]);
	        DB::statement('call answerCount('.$id.')');
	        $msg = 'Answer posted successfully!';
	        return back()->withInput()->withErrors([$msg]);
		}
		else{
			$msg = 'Sorry! Answer does not posted please try again';
	        return back()->withInput()->withErrors([$msg]);
		}
	}

	public function incApplyRate($answer_id){
		DB::statement('call applyAnswerRates('.$answer_id.',1)');

		return "Voted successfully!";
	}

	public function decApplyRate($answer_id){
		DB::statement('call applyAnswerRates('.$answer_id.',-1)');

		return "Voted successfully!";
	}
}