<?php

namespace App\Http\Controllers;

use App\User;

use App\Role;
use App\Permission;

use App\Http\Requests;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $user = User::all();
        return $this->response->array($user);
    }

    public function getUserRole($userID)
    {
        $user = User::findOrFail($userID);
        return $this->response->array($user->roles);
    }

    public function getPermissions(int $roleID)
    {
        $role = Role::findOrFail($roleID);

        return $this->response->array($role->permissions);
    }


    public function attachUserRole(Request $request)
    {
        $parameter = $request->only(['role', 'user']);

        $roleID = (int) $parameter['role'];
        $userID = (int) $parameter['user'];

        $user = User::findOrFail($userID);
        $role = Role::findOrFail($roleID);

        $user->roles()->attach($role);

        return $this->response->created();
    }

    public function attachPermission(Request $request)
    {
        $parameter = $request->only(['permission', 'role']);

        $roleID = (int) $parameter['role'];
        $permissionID = (int) $parameter['permission'];

        $role = Role::findOrFail($roleID);
        $permission = Permission::findOrFail($permissionID);

        $role->attachPermission($permission);

        return $this->response->created();

    }
}
