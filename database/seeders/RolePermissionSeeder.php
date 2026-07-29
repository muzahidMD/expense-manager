<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);

        $permission = [
            ['name' => 'user-create'],
            ['name' => 'user-edit'],
            ['name' => 'user-delete'],
            ['name' => 'user-view'],
            ['name' => 'rote-create'],
            ['name' => 'role-edit'],
            ['name' => 'role-delete'],
            ['name' => 'role-view'],
        ];

        foreach ($permission as $items) {
            Permission::create($items);
        }

        $role->syncPermissions(Permission::all());

        $user = User::first();
        $user->assignRole($role);
    }
}
