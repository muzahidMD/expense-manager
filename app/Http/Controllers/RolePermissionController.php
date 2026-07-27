<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function showRole()
    {
        return view('admin.role.index');
    }
}
