<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dishes extends Model
{
    public function category(): BelongsTo
{
    return $this->belongsTo(Category::class, 'category_id');
}
protected $table = 'dishes';
protected $guarded = [];
}
