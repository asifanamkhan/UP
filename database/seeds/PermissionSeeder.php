<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Abedon_Potro_create',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'Abedon_Potro_read',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'Abedon_Potro_up_dl',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'Abedon_Potro_generate',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'mamla_create',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'mamla_read',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'mamla_up_dl',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'registrationForm_create',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'registrationForm_read',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'registrationForm_up_dl',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'holdingTax_pay',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'banijjikKor_create',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'banijjikKor_read',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'banijjikKor_up_dl',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'banijjikKor_pay',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'businessKor_create',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'businessKor_read',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'businessKor_up_dl',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'businessKor_pay',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'doinik_hishab',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
        Permission::create([
            'name' => 'setupmenu_access',
            'display_name' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
        ]);
    }
}
