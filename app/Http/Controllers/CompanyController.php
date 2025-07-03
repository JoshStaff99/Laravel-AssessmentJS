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
        $companies = Company::Latest()->Paginate(10);

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

        // If logo file is present
        if ($request->hasFile('logo')) {
            // Store the logo in the 'public/logos' directory
            $logoPath = $request->file('logo')->store('logos', 'public');
            
            // Now, store the path relative to the public folder
            $validatedData['logo'] = 'storage/' . $logoPath;  // Save this in the database
        } else {
        // Use a placeholder image if no logo is uploaded
        $validatedData['logo'] = 'logos/100.png';
        }

        Company::create($validatedData);
    
        return redirect('/companies');
    }

    public function edit(Company $company)
    {

        return view ('companies.edit', ['company' => $company]);
    }

    public function update(Company $company, Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'logo' => ['nullable'],
            'website' => ['nullable', 'min:3'],
        ]);

        // If logo file is present
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $validatedData['logo'] = 'storage/' . $logoPath;
        } else {
            // Prevent overwriting logo with null if not uploading a new one
            unset($validatedData['logo']);
        }

        $company->update($validatedData);

        return redirect()->route('companies.show', ['company' => $company])
            ->with('success', 'Company updated successfully!');
    }

    public function destroy(Company $company)
    {
        // Check if the company has any employees
        if ($company->employees()->count() > 0) {
            return redirect('/companies')
                ->with('error', 'Cannot delete company: employees are assigned to this company.');
        }

        $company->delete();

        return redirect('/companies')
            ->with('success', 'Company deleted successfully!');
    }
}
