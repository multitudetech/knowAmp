<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class QuestionlistController extends Controller
{
	public function index(){
		$title = "KnowAmp";
    	$meta_description = "KnowAmp";
    	$data = DB::table('questions')
			->select('id', 'question_title', 'keywords', 'meta')
			->orderBy('audit_updated', 'desc')
			->simplePaginate(15);
		return view('admin.questionlist.index', compact('title', 'meta_description', 'data'));
	}

	public function store(Request $request){
		$title = "KnowAmp";
    	$meta_description = "KnowAmp";

    	$data = $request->only('id','question_title', 'keywords', 'meta');

		$new_array = array();
		foreach ($data as $outer_key => $outer_value) {
			foreach ($outer_value as $inner_key => $inner_value) {
				$new_array[$inner_key][$outer_key] = $inner_value;
			}
		}
		
    	foreach ($new_array as $_data) {
    		DB::table('questions')
    			->where('id', $_data['id'])
    			->update([
    				'question_title' => $_data['question_title'],
    				'keywords' => $_data['keywords'],
    				'meta' => $_data['meta']
    			]);
    	}

    	return redirect('/admin/questionlist');
	}
}