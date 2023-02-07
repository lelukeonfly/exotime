<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermanentBan extends Model
{
  use HasFactory;

  public function ban()
  {
    return $this->morphOne(Ban::class, 'bannable');
  }
}
