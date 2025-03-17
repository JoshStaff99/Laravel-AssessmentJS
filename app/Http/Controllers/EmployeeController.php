<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Mail\CompanyPosted;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::Latest()->simplePaginate(10);

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function show(Employee $employee)
    {
        // Get the company associated with the employee
        $company = $employee->company; 

        // Pass the company and employees to the view
        return view('employees.show', compact('employee'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'company' => ['required'],
            'email' => ['nullable'],
            'phone_number' => ['nullable'],
        ]);

        // Use the validated data to create a new employee
        $employees = Employee::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'company' => $validatedData['company'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
        ]);
    
        return redirect('/employees');
    }

    public function edit(Employee $employee)
    {

        return view ('employees.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee)
     {
        //Gate::authorize('edit-employee', $employees);

        // Validate the incoming request data
        $validatedData = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'company' => ['required'],
            'email' => ['nullable'],
            'phone_number' => ['nullable'],
        ]);

        // Use the validated data to create a new employee
        $employee->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'company' => $validatedData['company'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
        ]);

        return redirect()->route('employees.show', ['employee' => $employee])->with('success', 'Employee updated successfully!');
        //return redirect('/employees' . $employees->id);
     }

     public function destroy(Employee $employee)
     {
         //Gate::authorize('edit-employee', $employees);

         $employee->delete();

         return redirect('/employees');  
     }
}
