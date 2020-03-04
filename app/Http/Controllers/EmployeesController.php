<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Employees;
use App\Http\Requests\EmployeRequest;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::all();
        $employees = Employees::latest()->paginate(10);
        return view('employees.dashboard', compact('employees', 'companies'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeRequest $request)
    {
        $employees_data = array(
            'company_id' => $request->company_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        );

        Employees::create($employees_data);
        return redirect()->route('employees.index')
        ->with('success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employees::findOrFail($id);
        $companies = Companies::all();
        return view('employees.show', compact('data', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = Employees::findOrFail($id);
        $companies = Companies::all();
        return view('employees.edit', compact('employe', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_data = array(
            'company_id' => $request->company_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        );

        Employees::whereId($id)->update($update_data);
        return redirect()->route('employees.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employees::findOrFail($id);
        $employe->delete();
        return redirect()->route('employees.index')->with('success');
    }
}
