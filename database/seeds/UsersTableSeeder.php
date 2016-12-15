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
        $web = new User();
        $web->name = "WebClient";
        $web->email = "WebClient@laravel.com";
        $web->password = bcrypt("webClient");
        $web->save();

        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt("admin");
        $admin->save();
        factory(App\User::class, 9)->create();
    }
}
