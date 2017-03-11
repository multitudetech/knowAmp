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
        'name', 'nickname','email', 'password', 'contact_number', 'confirm_password', 'verification_code', 'user_id'
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
}
