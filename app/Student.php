<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function details(){
        return $this->hasOne( StudentDetails::class, 'student_id', 'id');
    }
    public function guardian(){
        return $this->hasOne( GuardianDetails::class, 'student_id', 'id');
    }
    public function user(){
        return $this->hasOne( User::class, 'student_id', 'id');
    }
}
