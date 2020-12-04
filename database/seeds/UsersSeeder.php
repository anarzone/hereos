<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        User::create([
            'fullname' => 'Tahmina Guliyeva',
            'username' => 'tahmina',
            'email'    => 'tahminaa.guliyeva@gmail.com',
            'password' => Hash::make('tahmina123'),
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
