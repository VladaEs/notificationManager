<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class CompanyUser extends Model
{
    protected $table = 'company_users';
    protected $fillable = [
        'company_id', 'user_id',
    ];
    public function scopeGetUserInfo($request) {
        return $request->join('users', 'users.id', '=', 'company_users.user_id');
    }



}
