<?php

namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $p1 = Permission::create([ 'id' => 1,'name' => 'users']);
        $p2 = Permission::create([ 'id' => 2,'name' => 'users.add']);
        $p3 = Permission::create([ 'id' => 3,'name' => 'users.edit']);
        $p4 = Permission::create([ 'id' => 4,'name' => 'users.delete']);
        $p5 = Permission::create([ 'id' => 5,'name' => 'users.deleteall']);
    }
}
