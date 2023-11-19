<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'time',
        'description',
    ];

    public function vehicles(): BelongsToMany {
        return $this->belongsToMany(Vehicle::class);
    }

    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
