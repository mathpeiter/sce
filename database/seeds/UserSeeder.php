<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'root',
            'cpf' => '12345678900',
            'cell' => '+55 51 9 9999-9999',
            'email' => 'root@root.com',
            'password' => Hash::make('root'),
            'permission' => True,
        ]);
    }
}
