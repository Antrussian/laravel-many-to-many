<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;

class DashboardController extends Controller
{
    //

    public function index() {
        $projects = Project::all(); // Recupera tutti i progetti
        return view('admin.dashboard', compact('projects')); // Passa i progetti alla vista della dashboard
    }
}


