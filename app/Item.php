<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function seller()
    {
      return $this->belongsTo('App\User','seller_id');
    }
}
