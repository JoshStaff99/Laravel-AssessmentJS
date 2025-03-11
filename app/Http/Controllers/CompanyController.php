<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Mail\CompanyPosted;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function show(Company $companies)
    {
        return view ('companies.show', ['companies' => $companies]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        
        $companies = Company::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        
        // Mail::to($companies)->queue(
        //     new CompanyPosted($companies)
        // );
    
        return redirect('companies.index');
    }

    public function edit(Company $job)
    {

        return view ('jobs.edit', ['job' => $job]);
    }

    // public function update(Company $companies)
    // {
    //     Gate::authorize('edit-company', $companies);

    //     request()->validate([
    //         'title' => ['required', 'min:3'],
    //         'salary' => ['required']
    //     ]);

    //     $companies->update([
    //         'title' => request('title'),
    //         'salary' => request('salary'),
    //     ]);

    //     return redirect('/companies' . $companies->id);
    // }

    // public function destroy(Company $companies)
    // {
    //     Gate::authorize('edit-company', $companies);

    //     $companies->delete();

    //     return redirect('/companies');  
    // }
}
