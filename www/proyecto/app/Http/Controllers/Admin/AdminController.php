<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;


class AdminController extends Controller
{
    public function index(){
        
        return view ('admin.index');
    }
    public function list_users(){
        $users=User::all();
        return view ('admin.list-users', compact('users'));  
    }
    public function list_projects(){
        $projects=Project::with('user')->paginate(20);
        return view ('admin.list-projects', compact('projects'));
    }

   
    
}
