<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table= "events";
    protected $fillable =['event_type_id', 'disk','file_name', "company_id", "read_at"];


    public function scopegetNewMessagesAmount($query, $company_id = 1){
        return $query->where('company_id', $company_id)->whereNull("read_at");
    }
    public function scopeJoinTables($query){
        return $query->join('companies', 'companies.id', '=', 'events.company_id')
        ->join('company_events', 'company_events.id', '=', 'events.event_type_id');
    }
}
