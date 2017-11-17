<?php

namespace App\Traits;

/**
 * Using this trait we'll order a collection of items based on different attributes
 */
trait OrderTrait
{
  function latestFirst($query)
  {
     return $query->orderBy('created_at','desc');
  }
  function oldestFirst($query)
  {
     return $query->orderBy('created_at','asc');
  }
}
