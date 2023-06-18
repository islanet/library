<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =
        factory(User::class)->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => md5('12345678')
        ]);
        //$user = factory(App\User::class)->create();
    }
}
