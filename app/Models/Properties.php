<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Properties extends Model
{
    use HasFactory;
    public function hasImages(): HasMany
    {
        return $this->hasMany(PropertyImages::class);
    }
    public function hasLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
