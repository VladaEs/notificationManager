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



}
