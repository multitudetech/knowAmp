<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname','email', 'password', 'contact_number', 'confirm_password', 'verification_code', 'user_id', 'question_title', 'question_description', 'txtEditorContent', 'txtEditor', 'answer_description', 'question_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'confirm_password'
    ];

    public static $create_validation_rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'confirm_password' => 'required',
        'contact_number' => 'required'
    ];

    public static $login_validation_rules = [
      'email' => 'required|email|exists:users',
      'password' => 'required',
    ];

    public static $ask_question_validation_rules = [
        'question_title' => 'required',
        'question_description' => 'required'
    ];

    public static $answer_validate_rules = [
        'answer_description' => 'required',
        'question_id' => 'required'
    ];

    public static $forget_password_validation_rules = [
        'email' => 'required|email|exists:users'
    ];

    public static $handle_reset_validation_rules = [
        'password' => 'required',
        'confirm_password' => 'required',
        'verification_code' => 'required'
    ];
}
