<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function areas(){
        return $this->belongsTo(Area::class,'area_id');
    }

    public function documenttypes(){
        return $this->belongsTo(DocumentType::class,'document_type_id');
    }
    public function incidences(){
        return $this->hasMany(Incidence::class);
    }
}
