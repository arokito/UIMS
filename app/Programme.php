<?php

namespace UIMS;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable=['name','department_id'];
    public function department(){
        return $this->belongsTo('UIMS\Department');
    }
}
