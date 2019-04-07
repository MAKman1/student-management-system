<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentDetails extends Model
{
    public function student(){
        return $this->hasOne( Student::class, 'student_id', 'id');
    }
}
