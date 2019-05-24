<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index',[
            'companies' => Company::all(),
        ]);
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create',[
            'company' => new Company(),
        ]);
    }

    /**
     * Store a newly created company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified company.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('company.show',[
            'company' => Company::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified company from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->removeImage();
        unset($company);
        Company::destroy($id);
        return redirect('company');
    }
        
    /**
     * Switch on/off company boolean property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchstate($id, $property)
    {
        $company = Company::find($id);
        $company->$property ? $company->$property = false : $company->$property = true;
        $company->save();
        return redirect()->route('company.show', ['id' => $id]);
    }
}
