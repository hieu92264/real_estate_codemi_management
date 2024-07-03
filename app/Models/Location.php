<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'city',
        'district',
        'ward',
        'street',
        'full_address'
    ];
    public function hasProperty(): BelongsTo
    {
        return $this->belongsTo(Properties::class, 'property_id');
    }


}
