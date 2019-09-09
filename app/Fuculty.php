<?php

namespace UIMS;

use Illuminate\Database\Eloquent\Model;

class Fuculty extends Model
{
    protected $fillabe=['name','campus_id'];
    public function campus(){
        return $this->belongsTo('UIMS\Campus');
    }
    Public function department(){
        return $this->hasMany('UIMS\Department');
    }
}
