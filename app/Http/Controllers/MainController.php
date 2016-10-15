<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;

use App\Http\Requests;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $user = User::all();
        return $this->response->array($user);
    }


    public function attachUserRole($userID, $roleID)
    {
        $user = User::findOrFail($userID);
        $role = Role::findOrFail($roleID);

        $user->roles()->attach($role);

        return $this->response->array(['user'=> $user->name, 'role' => $role->name]);
    }

}
