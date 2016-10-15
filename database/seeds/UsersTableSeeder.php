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
        $admin = new User();
        $admin->name = "CreativeKoen";
        $admin->email = "creativekoen@gmail.com";
        $admin->password = bcrypt("admin");
        $admin->save();
        factory(App\User::class, 9)->create();
    }
}
