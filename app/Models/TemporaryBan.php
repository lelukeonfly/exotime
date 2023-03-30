<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryBan extends Model
{
    use HasFactory;

    protected $fillable = [
        'until',
    ];

    public function ban()
    {
        return $this->morphOne(Ban::class, 'bannable');
    }
}
