<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyEvent extends Model{
    protected $table= "company_events";
    protected $fillable =['company_id', 'event_name'];
}
