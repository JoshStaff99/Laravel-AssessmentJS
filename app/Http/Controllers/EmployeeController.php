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
        $employees = Employee::simplePaginate(10);

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function show(Employee $employees)
    {
        return view ('employees.show', ['employees' => $employees]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        
        $employees = Employee::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        
        //  Mail::to($companies)->queue(
        //      new CompanyPosted($companies)
        //  );
    
        return redirect('employee.index');
    }

    public function edit(Employee $employees)
    {

        return view ('employees.edit', ['employees' => $employees]);
    }

    public function update(Employee $employees)
     {
         Gate::authorize('edit-employee', $employees);

         request()->validate([
             'title' => ['required', 'min:3'],
             'salary' => ['required']
         ]);

         $employees->update([
             'title' => request('title'),
             'salary' => request('salary'),
         ]);

         return redirect('/employees' . $employees->id);
     }

     public function destroy(Employee $employees)
     {
         Gate::authorize('edit-employee', $employees);

         $employees->delete();

         return redirect('/employees');  
     }
}
