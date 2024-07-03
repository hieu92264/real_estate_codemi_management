<?php

namespace App\Models;

use Hamcrest\Description;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Properties extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'status',
        'created_by_id',
        'updated_by_id',
    ];
    public function hasImages(): HasMany
    {
        return $this->hasMany(PropertyImages::class, 'property_id');
    }
    public function hasLocation(): HasOne
    {
        return $this->hasOne(Location::class, 'property_id');
    }
    public function hasDescription(): HasOne
    {
        return $this->hasOne(PropertiesDescription::class, 'property_id');
    }
    public function createBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');

    }
    public function updateBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

}
