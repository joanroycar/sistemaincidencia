<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    public function employees(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function subcategories(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');

    }

    public function priorities(){
        return $this->belongsTo(Priority::class,'priority_id');

    }

    public function resources(){
        return $this->morphMany(Resource::class, 'resourceable');
    }

}
