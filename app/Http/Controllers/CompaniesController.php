<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {

        $logo = $request->file('logo');
        $newLogoName = time() . '.' . $logo
            ->getClientOriginalExtension();
        $logo->move(storage_path('app/public/images'), $newLogoName);

        $companyData = [
            'logo' => $newLogoName,
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
        ];

        Company::create($companyData);
        return redirect()->route('companies.index')
            ->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Company::findOrFail($id);
        return view('companies.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company $companies
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $logoNewName = $request->hiddenLogo;
        $logo = $request->file('logo');

        $updateData = [
            'logo' => $logoNewName,
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
        ];

        Company::whereId($id)->update($updateData);
        return redirect()->route('companies.index')
            ->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')
            ->with('success');
    }


    /**
     * Display the company employees resource.
     *
     * @param  \App\Models\Company  $companies
     * @return \Illuminate\Http\Response
     */

    public function getCompanyEmployees($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.companyEmployees', compact('company'));
    }
}
