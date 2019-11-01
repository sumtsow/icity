<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CreateCompany;
use App\Http\Requests\UpdateCompany;
//use Illuminate\Http\Request;

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
     * @param \App\Http\Requests\CreateCompany  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompany $request)
    {
        $company = new Company();
        foreach(config('app.locales') as $locale) {
            $company->{'name_'.$locale} = $request->{'name_'.$locale};
            $company->{'description_'.$locale} = $request->{'description_'.$locale};
        }
        $company->id_plan = $request->plan;       
        $company->id_city = $request->city;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->payment_state = false; 
        $company->expired = false;
        $company->enabled = false;
        $company->work_begin = \Carbon\Carbon::createFromFormat('H:i', $request->work_begin)->format('H:i:s');
        $company->work_finish = \Carbon\Carbon::createFromFormat('H:i', $request->work_finish)->format('H:i:s');
        $company->map = $request->map;
        $company->website = $request->website;
        $company->skype = $request->skype;
        $company->twitter = $request->twitter;
        $company->viber = $request->viber; 
        $company->options = $request->options;
        if ($request->hasFile('image')) {
            if($request->file('image')->isValid()) {
                $company->image = $request->file('image')->getClientOriginalName();
                $company->addImage($request);
            }
        }
        $company->save();
        return redirect()->route('company.show', ['id' => $company->id]);
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
        return view('company.edit',[
            'company' => Company::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified company in storage.
     *
     * @param \App\Http\Requests\UpdateCompany  $request
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request)
    {
        $company = Company::find($request->id);
        foreach(config('app.locales') as $locale) {
            $company->{'name_'.$locale} = $request->{'name_'.$locale};
            $company->{'description_'.$locale} = $request->{'description_'.$locale};
        }
        $company->id_plan = $request->plan;       
        $company->id_city = $request->city;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->payment_state = $request->payment ? true : false; 
        $company->expired = $request->expired ? true : false;
        $company->enabled = $request->enabled ? true : false;
        $company->work_begin = \Carbon\Carbon::createFromFormat('H:i', $request->work_begin)->format('H:i:s');
        $company->work_finish = \Carbon\Carbon::createFromFormat('H:i', $request->work_finish)->format('H:i:s');
        $company->map = $request->map;
        $company->website = $request->website;
        $company->skype = $request->skype;
        $company->twitter = $request->twitter;
        $company->viber = $request->viber; 
        $company->options = $request->options;
        if ($request->hasFile('image')) {
            if($request->file('image')->isValid()) {
                $company->image = $request->file('image')->getClientOriginalName();
                $company->addImage($request);
            }
        }
        $company->save();
        return redirect()->route('company.show', ['id' => $company->id]);
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
