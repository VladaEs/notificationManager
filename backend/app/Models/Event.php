<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table= "events";
    protected $fillable =['event_type_id', 'payload_link', "company_id", "read_at"];
}
