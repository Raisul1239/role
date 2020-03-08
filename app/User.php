<?php

namespace App;
use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Events\UserCreatedEvent;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dispatchesEvents=[
        'created'=>UserCreatedEvent::class,
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasRole($role)
    {
         $roles = $this->roles()->where('name',$role)->count();  // ei class er vetore ekta method roles call kora hocche ,jekhane 
         //$role er vetor ja pass koranu hocche ta role table er name er sathe match koracche ebong count korteche.

         if($roles==1){
             return true;
         }
         return false;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}