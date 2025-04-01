<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ComboPlanController;
use App\Http\Controllers\EligibilityCriteriaController;

Route::get('/', function () {
    return redirect()->to(route('plans.index'));
});
Route::resource('plans',PlanController::class);
Route::resource('combo_plans',ComboPlanController::class);
Route::resource('eligibility_criterias',EligibilityCriteriaController::class);