<?php
use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'super_admin',
            'display_name' => 'Super Admin',
            'description' => 'Super Admin Has Every Permissions',
        ]);
        Role::create([
            'name' => 'public',
            'display_name' => 'general public',
            'description' => 'public Permissions',
        ]);
        $permission = Permission::all();

        foreach ($permission as $permissions){
            $role->attachPermission($permissions);
        }
    }
}