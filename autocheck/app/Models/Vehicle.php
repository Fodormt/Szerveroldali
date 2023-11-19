<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate',
        'brand',
        'type',
        'year',
        'filename',
        'filename_hash',
    ]; 

    public function events(): BelongsToMany {
        return $this->belongsToMany(Event::class);
    }
}
