<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'pasien-list',
            'pasien-create',
            'pasien-edit',
            'pasien-delete',
            'pendaftaran-list',
            'pendaftaran-create',
            'pendaftaran-edit',
            'pendaftaran-delete',
            'poliklik-list',
            'poliklik-create',
            'poliklik-edit',
            'poliklik-delete',
            'dokter-list',
            'dokter-create',
            'dokter-edit',
            'dokter-delete',
            'jadwal-praktek-list',
            'jadwal-praktek-create',
            'jadwal-praktek-edit',
            'jadwal-praktek-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
