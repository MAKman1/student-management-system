<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsTo( 'App\Role', 'role_id');
    }
    public function student(){
        return $this->belongsTo( Student::class, 'student_id');
    }
    public function employee(){
        return $this->belongsTo( Employee::class, 'employee_id');
    }
    public function guardian(){
        return $this->belongsTo( Guardian::class, 'guardian_id');
    }


     /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            if( $this->hasAnyRole($roles)){
                return TRUE;
            }
            else{
                abort(401, 'Unauthorized access.');
                return FALSE;
            }
        }
        if( $this->hasRole($roles)){
            return TRUE;
        }
        else{
            abort(401, 'Unauthorized access.');
            return FALSE;
        }
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role){
        //  $message = "answer: " . Auth::user()->name;
        //  echo "<script type='text/javascript'>alert('$message');</script>";
        if ($this->roles->name === $role) {
            return true;
        }
        return false;
    }
}
