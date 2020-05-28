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
            'cell' => '+5551999999999',
            'email' => 'root@gmail.com',
            'password' => 'root',
        ]);
    }
}
