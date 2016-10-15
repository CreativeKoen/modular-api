<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createPost = new Permission();
        $createPost->name = "create-post";
        $createPost->display_name = "Create Post";
        $createPost->description = "Create a new blog post";
        $createPost->save();

        $updatePost = new Permission();
        $updatePost->name = "update-post";
        $updatePost->display_name = "Update Post";
        $updatePost->description = "Update a blog post";
        $updatePost->save();

        $readPost = new Permission();
        $readPost->name = "read-post";
        $readPost->display_name = "Read Posts";
        $readPost->description = "Read blog posts";
        $readPost->save();

        $deletePost = new Permission();
        $deletePost->name = "delete-post";
        $deletePost->display_name = "Delete Post";
        $deletePost->description = "Delete a blog post";
        $deletePost->save();
    }
}
