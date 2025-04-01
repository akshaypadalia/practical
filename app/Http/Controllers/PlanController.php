<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index(){
        $plans = Plan::orderBy('name')->paginate(10);
        return view('plans.index',compact('plans'));
    }
    public function create(){
        return view('plans.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
        Plan::create($request->all());
        return redirect()->route('plans.index')->with('success', 'Plan Created Successfully');
    }
    public function edit(Plan $plan){
        return view('plans.edit',compact('plan'));
    }
    public function update(Request $request, Plan $plan){
        $request->validate([
            'name' => 'required|unique:plans,name,' . $plan->id,
            'price' => 'required|numeric',
        ]);
        $plan->update($request->all());
        return redirect()->route('plans.index')->with('success', 'Plan Updated Successfully');
    }
    public function destroy(Plan $plan){
        $plan->delete();
        return redirect()->route('plans.index')->with('success', 'Plan Deleted Successfully');
    }
}
