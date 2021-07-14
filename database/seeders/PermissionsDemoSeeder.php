<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'users']);
        Permission::create(['name' => 'users.add']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
        Permission::create(['name' => 'users.deleteall']);
        Permission::create(['name' => 'users.roles']);
        Permission::create(['name' => 'users.grantRole']);
        Permission::create(['name' => 'users.revokeRole']);

        Permission::create(['name' => 'roles']);
        Permission::create(['name' => 'roles.permissions']);
        Permission::create(['name' => 'roles.grantPermission']);
        Permission::create(['name' => 'roles.revokePermission']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'users-Admin']);
        $role2 = Role::create(['name' => 'roles-admin']);
        $role3 = Role::create(['name' => 'super-admin']);


        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $user = \App\Models\User::where('email','maysoon.abushaban@gmail.com')->first();
        $user->assignRole($role3);
    }
}
