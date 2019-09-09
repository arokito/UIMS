<?php

namespace UIMS;

use Illuminate\Database\Eloquent\Model;

class University extends Model

{
    
    protected $fillable =['name','telephone','email','physical_address',
'organization_type_id'];
    public function organization_type(){
       return $this->belongsTo('UIMS\Organization_type');
    }


    public function campus(){
        return $this->hasMany('UIMS\Campus');
    }
}
