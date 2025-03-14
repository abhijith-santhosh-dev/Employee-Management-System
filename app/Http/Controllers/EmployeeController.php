<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('employees', 'public');
            $data['photo'] = $photoPath;
        }

        Employee::create($data);
        
        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }




    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
   
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }






    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('photo')) {
           
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }
            
            $photoPath = $request->file('photo')->store('employees', 'public');
            $data['photo'] = $photoPath;
        }

        $employee->update($data);
        
        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }







    public function destroy(Employee $employee)
    {
       
        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }
        
        $employee->delete();
        
        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
    
}
