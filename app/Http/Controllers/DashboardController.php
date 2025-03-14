<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Employee;

class DashboardController extends Controller
{
    

    public function index()
    {
        $departments_count = Department::count();
        $employees_count = Employee::count();
        
        return view('dashboard', compact('departments_count', 'employees_count'));
    }
}
