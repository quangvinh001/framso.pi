<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
   public function __construct(){

   }
    public function index(Request $request){
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
}
