<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'title',
    'description',
    'postable_id',
    'postable_type',
  ];

  public function feedbacks()
  {
    return $this->morphMany(Feedback::class, 'feedbackable');
  }

  public function categories()
  {
    return $this->belongsToMany(Category::class);
  }

  public function postable()
  {
    return $this->morphTo();
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
