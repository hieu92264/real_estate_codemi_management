<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PropertiesDescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'owner',
        'phone_number',
        'gmail',
        'acreage',
        'price',
        'frontage',
        'house_direction',
        'floors',
        'bedrooms',
        'toilets',
        'legality',
        'furniture',
        'other_description'
    ];
    public function hasProperty(): BelongsTo
    {
        return $this->belongsTo(Properties::class, 'property_id');
    }
}
