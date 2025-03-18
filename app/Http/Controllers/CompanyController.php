<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Mail\CompanyPosted;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::Latest()->simplePaginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function show(Company $company)
    {
        // Get the employees associated with the company
        $employees = $company->employees; 

        // Pass the company and employees to the view
        return view('companies.show', compact('company', 'employees'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'logo' => ['nullable'],
            'website' => ['nullable', 'min:3'],
        ]);
    
        // if ($request->hasFile('logo')) {
        //     $validatedData['logo'] = $request->file('logo')->store('logos', 'public');  // Store in 'storage/app/public/logos'
        //     //= $request->file('logo')->store('logos', 'public');  // Store in 'storage/app/public/logos'
        // }

            // If logo file is present
        if ($request->hasFile('logo')) {
            // Store the logo in the 'public/logos' directory
            $logoPath = $request->file('logo')->store('logos', 'public');
            
            // Now, store the path relative to the public folder
            $validatedData['logo'] = 'storage/logos' . $logoPath;  // Save this in the database
        }

        // Use the validated data to create a new company
        // $companies = Company::create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'logo' => $validatedData['logo'],
        //     'website' => $validatedData['website'],
        // ]);

        Company::create($validatedData);
    
        return redirect('/companies');
    }

    public function edit(Company $company)
    {

        return view ('companies.edit', ['company' => $company]);
    }

    public function update(Company $company)
     {
        // Gate::authorize('edit-company', $companies);

        $validatedData = request()->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required', 'min:3'],
        'logo' => ['nullable'],
        'website' => ['nullable', 'min:3'],
        ]);

        $company->update([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'logo' => $validatedData['logo'],
        'website' => $validatedData['website'],
        ]);

        return redirect()->route('companies.show', ['company' => $company])->with('success', 'Company updated successfully!');
        //return redirect('companies.show', ['company' => $company]);
     }

     public function destroy(Company $company)
     {
        //Gate::authorize('edit-company', $companies);

        $company->delete();

        return redirect('/companies');  
     }
}
