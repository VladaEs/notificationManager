<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{
    public function index(){

        //Role::create(['name'=>"guest"]);
        //Permission::create(['name'=>"view login"]);
        return "Test";

    }
}
