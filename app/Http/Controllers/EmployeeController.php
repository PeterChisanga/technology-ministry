<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            // 'salary' => 'nullable|required|numeric',
            'joining_date' => 'required|date',
            'birth_date' => 'required|date',
            'contact_number' => 'required',
            'email' => 'required|email|unique:employees,email|unique:users,email',
            'address' => 'required',
            'employee_type' => 'required',
            // 'user_id' => 'required|exists:users,id',
            'department_id' => 'nullable|exists:departments,id',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        $user = User::create([
            'name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $employeeData = $request->except(['password', 'confirm_password']);
        $employeeData['user_id'] = $user->id;

        $employee = Employee::create($employeeData);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'status' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'salary' => 'required|numeric',
            'joining_date' => 'required|date',
            'birth_date' => 'required|date',
            'contact_number' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'address' => 'required',
            'employee_type' => 'required',
            'user_id' => 'required|exists:users,id',
            'department_id' => 'nullable|exists:departments,id',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
