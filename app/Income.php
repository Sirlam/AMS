<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
  //
  //
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $table = 'incomes';

  public $primaryKey = 'id';

  protected $fillable = [
      'description', 'amount', 'on_account','created_by','last_updated_by'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */

   public function account()
   {
     return $this->belongsTo('App\Account');
   }
}
