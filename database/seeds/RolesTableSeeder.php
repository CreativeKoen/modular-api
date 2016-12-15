<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = "Admin";
        $admin->display_name = "Administrator";
        $admin->description = "An Administrator can c,r,u,d blog posts and Users/Product Owners";
        $admin->save();

        $owner = new Role();
        $owner->name = "Owner";
        $owner->display_name = "Product Owner";
        $owner->description = "Product Owner can c,r,u,d blog posts";
        $owner->save();

        $user = new Role();
        $user->name = "User";
        $user->display_name = "User";
        $user->description = "Normal User that only can read and update posts";
        $user->save();

        $web = new Role();
        $web->name = "WebClient";
        $web->display_name = "Web user";
        $web->description = "An Role as Web User is used for the React Frondend, Note this is virtual user";
        $web->save();
    }
}
