<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\ComboPlan;

class ComboPlanController extends Controller
{
    public function index(){
        $comboPlans = ComboPlan::orderBy('name')->paginate(10);
        return view('combo_plans.index',compact('comboPlans'));
    }
    public function create(){
        $plans = Plan::orderBy('name')->pluck('name', 'id');
        return view('combo_plans.create',compact('plans'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:combo_plans',
            'price' => 'required',
            'selected_plan' => 'required|array|min:1',
            'selected_plan.*' => 'exists:plans,id',
        ]);

        $plans = implode(',', $request->selected_plan);

        ComboPlan::create([
            'name' => $request->name,
            'price' => $request->price,
            'plan_ids' => $plans,
        ]);
        return redirect()->route('combo_plans.index')->with('success', 'Combo Plan Created Successfully');
    }

    public function edit(ComboPlan $comboPlan){
        $plans = Plan::orderBy('name')->pluck('name', 'id');
        return view('combo_plans.edit',compact('comboPlan', 'plans'));
    }

    public function update(Request $request, ComboPlan $comboPlan){
        $request->validate([
            'name' => 'required|unique:combo_plans,name,'.$comboPlan->id,
            'price' => 'required',
            'selected_plan' => 'required|array|min:1',
            'selected_plan.*' => 'exists:plans,id',
        ]);

        $plans = implode(',', $request->selected_plan);

        $comboPlan->update([
            'name' => $request->name,
            'price' => $request->price,
            'plan_ids' => $plans,
        ]);

        return redirect()->route('combo_plans.index')->with('success', 'Combo Plan Updated Successfully');
    }

    public function destroy(ComboPlan $comboPlan){
        $comboPlan->delete();

        return redirect()->route('combo_plans.index')->with('success', 'Combo Plan Deleted Successfully');
    }
}