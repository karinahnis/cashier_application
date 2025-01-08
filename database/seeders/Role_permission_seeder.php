<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class Role_permission_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(attributes: ['name' => 'product_view', 'guard_name' => 'web']);
        $this->createUsers();
    }

    private function createUsers(): void 
    {
        Role::create(['name' => 'admin', 'guard_name' => 'web']) -> givePermissionTo(Permission::all());
        $admin = User::create([
            'username' => 'admin',
            'name' => 'admin',
            'password' => 'ica',
        ]);
        $admin->assignRole('admin');
    }
}
