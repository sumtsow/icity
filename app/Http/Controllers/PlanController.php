<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Http\Requests\UpdatePlan;
use App\Http\Requests\CreatePlan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the tariff plans.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plan.index', [
            'plans' => Plan::all(),
        ]);
    }

    /**
     * Show the form for creating a new tariff plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plan.create',[
            'plan' => new Plan(),
        ]);
    }

    /**
     * Store a newly created tariff plan in storage.
     *
     * @param  \App\Http\Request\CreatePlan  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlan $request)
    {
        $plan = new Plan();
        foreach(config('app.locales') as $locale) {
            $plan->{'name_'.$locale} = $request->{'name_'.$locale};
            $plan->{'description_'.$locale} = $request->{'description_'.$locale};
        }
        $plan->price = $request->price;
        $plan->validity = $request->validity;
        $plan->save();
        return redirect()->route('plan.show', ['id' => $plan->id]);
    }

    /**
     * Display the specified plan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('plan.show',[
            'plan' => Plan::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified tariff plan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('plan.edit',[
            'plan' => Plan::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified tariff plan in storage.
     *
     * @param  \App\Http\Request\UpdatePlan  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlan $request, $id)
    {
        $plan = Plan::find($id);
        foreach(config('app.locales') as $locale) {
            $plan->{'name_'.$locale} = $request->{'name_'.$locale};
            $plan->{'description_'.$locale} = $request->{'description_'.$locale};
        }
        $plan->price = $request->price;
        $plan->validity = $request->validity;
        $plan->save();
        return redirect()->route('plan.show', ['id' => $plan->id]);
    }

    /**
     * Remove the specified tariff plan from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plan::destroy($id);
        return redirect()->route('plan.show', ['id' => $id]);
    }
}
