<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
  use HasFactory;

  protected $fillable = [
    'banned_until',
    'ban_reason',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
