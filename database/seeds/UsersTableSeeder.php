<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@admin.com')->first();

        if (!$user){
            User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role'  => 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}
