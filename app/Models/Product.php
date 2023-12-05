<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
    public function segment(): BelongsTo
    {
        return $this->belongsTo(Segment::class);
    }
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
