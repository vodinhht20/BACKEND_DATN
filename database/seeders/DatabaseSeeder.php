<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Product::factory(5)->create();
        // \App\Models\Category::factory(10)->create();
        // \App\Models\User::factory(10)->create();

        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'cpanel']);
        // $role->givePermissionTo($permission);
        // $user = User::find(1);
        // $user->assignRole('admin');
    }
}
