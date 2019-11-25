<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 10)->create(); //Não sei qual a password com ele cria

        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@mail.pt',
            'password' => bcrypt('123'),
            'email_verified_at' => Carbon\Carbon::now(),
            'remember_token' => Str::random(10),
        ]);

        DB::table('trash_cans')->insert([
            'humidity' => '50',
            'temperature' => '22.5',
        ]);
    }
}
