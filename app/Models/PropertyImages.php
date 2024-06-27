<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyImages extends Model
{
    use HasFactory;
    public function hasProperty(): BelongsTo
    {
        return $this->belongsTo(Properties::class);
    }
}
