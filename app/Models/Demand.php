<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'duration_min',
        'starting_at',
        'ending_at',
    ];

    public function post()
    {
        return $this->morphOne(Post::class, 'postable');
  }
}
