<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function showRole()
    {
        $roles = Role::select(['name'])->get();
        return view('admin.role.index', compact('roles'));
    }
}
