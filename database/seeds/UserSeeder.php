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
          'name'  => 'Admin da Silva',
          'email'  => 'admin@admin.com.br',
          'password'  => Hash::make(12345678),
        ]);

        $user->admin = true;
        $user->save();

        $professor = new User([
          'name'  => 'Professor da Silva',
          'email'  => 'professor@professor.com.br',
          'password'  => Hash::make(12345678),
        ]);

        $professor->professor = true;
        $professor->save();

        $professor2 = new User([
          'name'  => 'Professor dos Santos',
          'email'  => 'techaer@teacher.com.br',
          'password'  => Hash::make(12345678),
        ]);

        $professor2->professor = true;
        $professor2->save();
    }
}
