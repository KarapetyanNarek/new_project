<?php

namespace App\Http\Controllers;

use App\Companies;
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
    $companies = Companies::latest()->paginate(10);
    return view('companies.dashboard', compact('companies'))->with('i', (request()->input('page', 1)-1) * 10);
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
    public function store(Request $request)
    {
        // $request->validate([
        //     'logo'    => 'requird|image|max:20',
        //     'name'    => 'requird',
        //     'email'   => 'requird',
        //     'website' => 'requird'
        // ]);

        

        $logo = $request->file('logo');
        $new_logo_name = time() . '.' . $logo -> getClientOriginalExtension();
        $logo -> move(public_path('images'), $new_logo_name);

        $company_data = array(
            'logo'    => $new_logo_name,
            'name'    => $request -> name,
            'email'   => $request -> email,
            'website' => $request -> website
        );

        Companies::create($company_data);

        return redirect() -> route('companies.index')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Companies::findOrFail($id);
        $company -> delete();
        return redirect()->route('companies.index')->with('success');
    }
}
