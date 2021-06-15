<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'administrador 1',
            'email' => 'administrador@email.com',
            'password' => bcrypt('secret'),
            'phone' => '123456'
        ]);

        $roleAdmin = Role::create(['name' => 'administrador']);
        $roleStudent = Role::create(['name' => 'alumno']);

        $admin->assignRole($roleAdmin);
    }
}
