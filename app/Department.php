<?php

namespace UIMS;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{ 
    protected $fillable=['name','fuculty_id'];
    public function fuculty(){
        return $this-> belongsTo('UIMS\Fuculty');
    }

    public function programme(){
        return $this->hasMany('UIMS\Programme');
    }
}
