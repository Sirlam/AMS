<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'accounts';

    public $primaryKey = 'id';

    protected $fillable = [
        'name', 'description', 'starting_balance', 'current_balance','created_by','last_updated_by'
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
