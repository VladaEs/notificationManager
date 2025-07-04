<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table ="companies";
    protected $fillable =['name', 'api_key', 'edited_by'];
    


        public function scopeGetCompanyUsers($query ,$compId = 0){
        $query->join('company_users', 'company_id', '=', 'companies.id');

        if($compId != 0){
            $query->where('company_id', $compId);
        }
        return $query;
    }
}
