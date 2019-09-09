<?php

namespace UIMS;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected  $fillable =['name','university_id'];
    public function university(){
        return $this->belongsTo('UIMS\University');
    }

    public function faculty(){
        return $this->hasMany('UIMS\Faculty');
    }
}
