<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price'];

    protected static function boot() {
        parent::boot();

        static::deleting(function ($plan) {
            DB::table('combo_plans')
                ->whereRaw("FIND_IN_SET(?, plan_ids)", [$plan->id])
                ->get()
                ->each(function($comboPlan) use($plan) {
                    $planIds = explode(',', $comboPlan->plan_ids);

                    $planIds = array_filter($planIds, function($id) use($plan) {
                        return $id != $plan->id;
                    });

                    if (empty($planIds)) {
                        DB::table('combo_plans')->where('id', $comboPlan->id)->delete();
                    } else {
                        DB::table('combo_plans')
                            ->where('id', $comboPlan->id)
                            ->update(['plan_ids' => implode(',', $planIds)]);
                    }
                });
        });
    }

    public function comboPlans(){
        return $this->hasMany(ComboPlan::class);
    }
}
