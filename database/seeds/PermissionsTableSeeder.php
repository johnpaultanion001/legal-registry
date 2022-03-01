<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'title' => 'admin_access',
            ],
            [
                'title' => 'clinic_access',
            ],
            [
                'title' => 'client_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
