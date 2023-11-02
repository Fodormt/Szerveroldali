<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'time',
        'time'
    ];

    public function vehicles(): BelongsToMany {
        return $this->belongsTo(Vehicle::class);
    }
}
