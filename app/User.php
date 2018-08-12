<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    public $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password', 'dept_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department()
    {
      return $this->hasOne('App\Department');
    }

    public function accounts()
    {
      return $this->hasMany('App\Account');
    }
}
