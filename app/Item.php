<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\OrderTrait;

class Item extends Model
{
    use OrderTrait;

    public function seller()
    {
      return $this->belongsTo('App\User','seller_id');
    }
}
