<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin')
        ]);
        $user2 = User::create([
            'name' => 'pasien',
            'email' => 'pasien@test.com',
            'password' => bcrypt('pasien')
        ]);
        $role = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Pasien']);

        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
        $user2->assignRole($role2);
    }
}
