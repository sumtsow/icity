<?php

namespace App\Http\Controllers;

use App\Service;
use App\Http\Requests\CreateService;
use App\Http\Requests\UpdateService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.index',[
			'services' => Service::all(),
        ]);
    }

    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create',[
            'service' => new Service(),
        ]);
    }

    /**
     * Store a newly created service in storage.
     *
     * @param  \App\Http\Requests\CreateCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateService $request)
    {
        $service = new Service();
        foreach(config('app.locales') as $locale) {
            $service->{'name_'.$locale} = $request->{'name_'.$locale};
        }
        $service->image = $service->image;
        $service->options = $service->options;
        //$service->save();
        return redirect(route('service.index'/*,['id' => $service->id]*/ ));
    }
    
    /**
     * Display the specified service.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        return view('service.view',[
            'service' => Service::find($id),
        ]);
    }
    
    /**
     * Display the specified service for administrator.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('service.show',[
            'service' => Service::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view('service.edit',[
            'service' => Service::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified service in storage.
     *
     * @param \App\Http\Requests\CreateService  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(CreateService $request,  $id)
    {
        $service = Service::find($id);
        foreach(config('app.locales') as $locale) {
            $service->{'name_'.$locale} = $request->{'name_'.$locale};
            $service->{'description_'.$locale} = $request->{'description_'.$locale};
            $units = Service::getUnits($locale);
            $service->{'unit_'.$locale} = $units[$request->unit];
        }
        $service->id_category = $request->category;
        $service->id_company = $request->company;
        $service->price = $request->price;
        $service->minimum_batch = $request->minimum_batch;        
        $service->maximum_batch = $request->maximum_batch;
        $service->discount = $request->discount;
        $service->image = $request->image;
        $service->options = $request->options;
        $service->save();
        return redirect(route('service.show', ['id' => $service->id]));
    }

    /**
     * Remove the specified service from storage.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Service::destroy($id);
		return redirect('service');
    }
}
