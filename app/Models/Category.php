<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_image_name',
        'category_type',
        'description',
    ];


    public function segments(): HasMany
    {
        return $this->hasMany(Segment::class);
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
