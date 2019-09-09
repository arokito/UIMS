<?php

namespace UIMS;

use Illuminate\Database\Eloquent\Model;

class Organization_type extends Model
{   

      protected  $fillable =['name'];
    public function university(){
      return $this->hasMany('UIMS\University');
    }
}
