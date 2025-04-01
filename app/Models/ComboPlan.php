<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
class ComboPlan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'plan_ids'];

    public function getPlanIdsAttribute($value) {
        return explode(',', $value);
    }

    public function getPlan(){
        return Plan::whereIn('id', $this->plan_ids)->get();
    }

    public function getPlanNames() {
        return $this->getPlan()->pluck('name');
    }
}
