<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyImages extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'property_id',
        'image_url',


    ];
    public function hasProperty(): BelongsTo
    {
        return $this->belongsTo(Properties::class, 'property_id');
    }

}
