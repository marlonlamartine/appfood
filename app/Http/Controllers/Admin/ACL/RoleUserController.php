<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{

    protected $role, $user;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;

        $this->middleware(['can:users']);
    }

    public function roles($idUser)
    {
        $user = $this->user->find($idUser);

        if(!$user)
        {
            return redirect()->back();
        }

        $roles = $user->roles()->paginate();

        return view('admin.pages.users.roles.roles', [
            'user' => $user,
            'roles' => $roles
        ]);
    }


    public function users($idRole)
    {
        $role = $this->role->find($idRole);

        if(!$role)
        {
            return redirect()->back();
        }

        $users = $role->users()->paginate();

        return view('admin.pages.roles.users.users', [
            'users' => $users,
            'role' => $role
        ]);
    }
    

    public function rolesAvailable(Request $request, $idUser)
    {
        $user = $this->user->find($idUser);

        if(!$user)
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $roles = $user->rolesAvailable($request->filter);

        return view('admin.pages.users.roles.available', [
            'user' => $user,
            'roles' => $roles,
            'filters' => $filters
        ]);
    }


    public function attachRolesUser(Request $request, $idUser)
    {
        $user = $this->user->find($idUser);

        if(!$user)
        {
            return redirect()->back();
        }

        if(!$request->roles || count($request->roles) == 0)
        {
            return redirect()->back()->with('info', 'Precisa escolher ao menos uma permissão');
        }

        $user->roles()->attach($request->roles);

        return redirect()->route('users.roles', $user->id);
    }


    public function detachRoleUser($idUser, $idRole)
    {
        $user = $this->user->find($idUser);
        $role = $this->role->find($idRole);

        if(!$user || !$role)
        {
            return redirect()->back();
        }

        $user->roles()->detach($role);

        return redirect()->route('users.roles', $user->id);
    }
}
