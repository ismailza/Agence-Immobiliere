<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
}
