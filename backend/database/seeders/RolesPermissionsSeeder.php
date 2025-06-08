<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $guest_role= Role::create(['name' => 'guest']);
        $user_role= Role::create(['name' => 'user']);
        $admin_role= Role::create(['name' => 'admin']);

        $view_inbox_permission= Permission::create(['name'=> 'view inbox']);
        $view_users_permission= Permission::create(['name'=> 'view users']);
        $view_full_inbox_permission= Permission::create(['name'=> 'view full inbox']);

        $user_role->givePermissionTo($view_inbox_permission);
        
        $admin_role->givePermissionTo($view_users_permission);
        $admin_role->givePermissionTo($view_full_inbox_permission);
        $admin_role->givePermissionTo($view_inbox_permission);
                
    }
}
