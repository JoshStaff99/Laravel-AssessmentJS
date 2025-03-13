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

    public function show(Company $companies)
    {
        return view ('companies.show', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
            'logo' => ['nullable'],
            'website' => ['nullable', 'min:3'],
        ]);
    
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');  // Store in 'storage/app/public/logos'
            $validatedData['logo'] = $logoPath;
        }

        // Use the validated data to create a new company
        $companies = Company::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'logo' => $validatedData['logo'],
            'website' => $validatedData['website'],
        ]);

        
        //   Mail::to($companies)(
        //       new CompanyPosted($companies)
        //   );
    
        return redirect('/companies');
    }

    public function edit(Company $companies)
    {

        return view ('companies.edit', ['companies' => $companies]);
    }

    public function update(Company $companies)
     {
         Gate::authorize('edit-company', $companies);

         request()->validate([
             'title' => ['required', 'min:3'],
             'salary' => ['required']
         ]);

         $companies->update([
             'title' => request('title'),
             'salary' => request('salary'),
         ]);

         return redirect('/companies' . $companies->id);
     }

     public function destroy(Company $companies)
     {
         Gate::authorize('edit-company', $companies);

         $companies->delete();

         return redirect('/companies');  
     }
}
