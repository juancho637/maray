<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'identification' => 1107088223,
            'name' => 'Juan David',
            'last_name' => 'Garcia Reyes',
            'full_name' => 'Juan David Garcia Reyes',
            'professional_identification' => null,
            'address' => 'Cra 1a 12',
            'cell_phone' => '(315) 601-1981',
            'phone' => '(032) 440-1233',
            'email' => 'juan@mail.com',
            'occupation_id' => 1,
            'password_change' => true,
            'password' => bcrypt('contraseña'),
        ]);
        User::create([
            'identification' => 110672973,
            'name' => 'Marta',
            'last_name' => 'Naranjo',
            'full_name' => 'Marta Naranjo',
            'professional_identification' => 9844,
            'address' => 'xxx xx xxx xxxx',
            'cell_phone' => '(314) 083-6749',
            'phone' => '(032) 345-7890',
            'email' => 'marta@mail.com',
            'occupation_id' => 1,
            'password_change' => true,
            'password' => bcrypt('contraseña'),
        ]);
        User::create([
            'identification' => 345672973,
            'name' => 'Victor Hugo',
            'last_name' => 'Medina',
            'full_name' => 'Victor Hugo Medina',
            'professional_identification' => null,
            'address' => 'xxx xx xxx xxxx',
            'cell_phone' => '(316) 012-8753',
            'phone' => '(032) 345-0982',
            'email' => 'victor@mail.com',
            'occupation_id' => 1,
            'password_change' => true,
            'password' => bcrypt('contraseña'),
        ]);

        factory(User::class, 30)->create();
    }
}
