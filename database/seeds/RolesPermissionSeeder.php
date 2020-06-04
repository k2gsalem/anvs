<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'create parent']);
        Permission::create(['name'=>'edit parent']);
        Permission::create(['name'=>'delete parent']);
        Permission::create(['name'=>'view parent']);
        Permission::create(['name'=>'create child']);
        Permission::create(['name'=>'edit child']);
        Permission::create(['name'=>'delete child']);
        Permission::create(['name'=>'view child']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $user=User::find(1);

        $user->assignRole('admin');
        $user->givePermissionTo(Permission::all());

    }
}
