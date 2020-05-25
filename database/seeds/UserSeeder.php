<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,20)->create();

        $user = new User([
            'name' => 'Admin da Silva',
            'email' => 'admin@admin.com.br',
            'password' => Hash::make(12345678),
        ]);
        $user->admin = true;
        $user->save();

    }
}
