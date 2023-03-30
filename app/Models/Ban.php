<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'bannable_id',
        'bannable_type',
    ];

    //https://laravel.com/docs/9.x/eloquent-relationships#touching-parent-timestamps
    // can be:
    // temporary_ban
    // permanent_ban
    // unban

    public function bannable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
