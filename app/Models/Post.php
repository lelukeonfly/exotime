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
        'duration_min',
        'preferred_location',
        'postable_id',
        'postable_type',
    ];


    public function requestedByUsers()
    {
        return $this->belongsToMany(User::class, 'post_user')
        ->withPivot('status');
    }

    public function acceptRequest($user_id)
    {
        $this->requestedByUsers()->updateExistingPivot($user_id, ['status' => 'accepted']);
    }

    public function rejectRequest($user_id)
    {
        $this->requestedByUsers()->updateExistingPivot($user_id, ['status' => 'rejected']);
    }

    public function supplies() {
        return $this->belongsToMany(Supply::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function feedbacks()
    {
        return $this->morphMany(Feedback::class, 'feedbackable');
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
