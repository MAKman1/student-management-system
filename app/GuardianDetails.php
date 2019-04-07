<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuardianDetails extends Model
{
    public function student(){
        return $this->hasMany( Student::class, 'guardian_id', 'id');
    }
    public function user(){
        return $this->hasOne( User::class, 'guardian_id', 'id');
    }
}
