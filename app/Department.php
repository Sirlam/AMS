<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'departments';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     public function user()
     {
       return $this->belongsTo('App\User');
     }
}
