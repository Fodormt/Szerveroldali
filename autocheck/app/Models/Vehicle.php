<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate',
        'brand',
        'type',
        'year',
        'filename',
        'filename_hash'    
    ]; 

    public function events(): BelongsToMany {
        return $this->belongsTo(Event::class);
    }
}
