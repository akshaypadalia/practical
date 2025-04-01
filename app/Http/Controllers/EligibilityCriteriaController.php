<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EligibilityCriteria;

class EligibilityCriteriaController extends Controller
{
    public function index(){
        $eligibilityCriteria = EligibilityCriteria::orderBy('name')->paginate(10);
        return view('eligibility_criterias.index', compact('eligibilityCriteria'));
    }
    public function create(){
        return view('eligibility_criterias.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:eligibility_criterias',
            'age_less_than' => 'required|numeric',
            'age_greater_than' => 'required|numeric',
            'last_login_days_ago' => 'required|numeric',
            'income_less_than' => 'required|numeric',
            'income_greater_than' => 'required|numeric',
        ]);
        EligibilityCriteria::create($request->all());
        return redirect()->route('eligibility_criterias.index')->with('success', 'Eligibility Criteria Created Successfully');
    }
    public function edit(EligibilityCriteria $eligibilityCriteria){
        return view('eligibility_criterias.edit',compact('eligibilityCriteria'));
    }
    public function update(Request $request, EligibilityCriteria $eligibilityCriteria){
        $request->validate([
            'name' => 'required|unique:eligibility_criterias,name,' . $eligibilityCriteria->id,
            'age_less_than' => 'required|numeric',
            'age_greater_than' => 'required|numeric',
            'last_login_days_ago' => 'required|numeric',
            'income_less_than' => 'required|numeric',
            'income_greater_than' => 'required|numeric',
        ]);
        $eligibilityCriteria->update($request->all());
        return redirect()->route('eligibility_criterias.index')->with('success', 'Eligibility Criteria Updated Successfully');
    }
    public function destroy(EligibilityCriteria $eligibilityCriteria){
        $eligibilityCriteria->delete();
        return redirect()->route('eligibility_criterias.index')->with('success', 'Eligibility Criteria Deleted Successfully');
    }
}
