<?php

namespace App\Models;

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
    'username',
    'email',
    'password',
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

    public function isBanned()
    {
        $lastBans = $this->getLastBans();

        if ($lastBans->count() === 0) {
            return false;
        }

        if ($this->isPermanentlyBanned($lastBans)) {
            return true;
        }

        if ($lastBans->count() < 3) {
            return $this->isTemporarilyBanned($lastBans);
        }

        if ($this->isAllTempBans($lastBans)) {
            $this->banPermanent(reason: 'You exceeded the amount of 3 temporary bans');
            return true;
        }

        return $lastBans->first()->until > now();
    }

    private function getLastBans()
    {
        return $this->bannable()->take(3)->get();
    }

    private function isPermanentlyBanned($lastBans)
    {
        return $lastBans->first()->bannable instanceof PermanentBan;
    }

    private function isTemporarilyBanned($lastBans)
    {
        if ($lastBans->first()->bannable instanceof TemporaryBan) {
            return $lastBans->first()->bannable->until > now();
        }
        return false;
    }

    private function isAllTempBans($lastBans)
    {
        return $lastBans->every(function ($ban) {
            return $ban->bannable instanceof TemporaryBan;
        });
    }

    public function banPermanent($reason)
    {
        $perm = new PermanentBan;
        $perm->save();

        $ban = new Ban;
        $ban->user_id = $this->id;
        $ban->reason = $reason;
        $ban->bannable()->associate($perm);
        $this->bans()->save($ban);
    }

    public function banTemporary($days, $reason)
    {
        $temp = new TemporaryBan;
        $temp->until = now()->addDays($days);
        $temp->save();

        $ban = new Ban;
        $ban->reason = $reason;
        $ban->bannable()->associate($temp);
        $this->bans()->save($ban);
    }

    public function unban($reason)
    {
        $unban = new UnBan;
        $unban->save();

        $ban = new Ban;
        $ban->reason = $reason;
        $ban->bannable()->associate($unban);
        $this->bans()->save($ban);
    }
}
