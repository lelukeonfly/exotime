<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens;
  use HasFactory;
  use HasProfilePhoto;
  use Notifiable;
  use TwoFactorAuthenticatable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'permanently_banned',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
    'two_factor_recovery_codes',
    'two_factor_secret',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array<int, string>
   */
  protected $appends = [
    'profile_photo_url',
    'ban_count',
    'temporary_ban_count',
    'permanent_ban_count',
    'is_banned',
  ];

  public function posts()
  {
    return $this->hasMany(Post::class);
  }

  public function feedbacks()
  {
    return $this->morphMany(Feedback::class, 'feedbackable');
  }

  public function bans()
  {
    return $this->hasMany(Ban::class)->orderBy('created_at', 'desc');
  }

  public function bannable()
  {
    return $this->bans()->with('bannable');
  }

  public function getBanCountAttribute()
  {
    return $this == auth()->user() ?
      $this->bans
       ->whereIn('bannable_type', [TemporaryBan::class, PermanentBan::class])
       ->count() : null;
  }

  public function getTemporaryBanCountAttribute()
  {
    return $this == auth()->user() ?
      $this->bans
      ->where('bannable_type', TemporaryBan::class)
      ->count() : null;
  }

  public function getPermanentBanCountAttribute()
  {
    return $this == auth()->user() ?
      $this->bans
      ->where('bannable_type', PermanentBan::class)
      ->count() : null;
  }

  public function getIsBannedAttribute()
  {
    #https://laravel.com/docs/9.x/eloquent-relationships#one-of-many-polymorphic-relations
    if ($this == auth()->user()) {
      if ($this->bans->first()->bannable_type == "App\Models\UnBan") {
        return false;
      }

      if ($this->bans->first()->bannable_type == "App\Models\TemporaryBan") {
        return $this->bans->first()->bannable->until > now();
      }
    }

    return $this->ban_count > 0;
  }
}
