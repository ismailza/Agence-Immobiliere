<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Boolean;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'address',
        'city',
        'postal_code',
        'price',
        'sold',
    ];

    public function options () {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug () {
        return Str::slug($this->title);
    }

    public function pictures () {
        return $this->hasMany(Picture::class);
    }

    public function scopeAvailable (Builder $builder, bool $available = true): Builder {
        return $builder->where('sold', !$available);
    }

    public function scopeRecent (Builder $builder): Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }

}
