<?php

namespace App\Models;

use App\Models\Orders;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dishes extends Model
{
    public function category(): BelongsTo
{
    return $this->belongsTo(Category::class, 'category_id');
}

// public function orders(): HasMany
// {
//     return $this->hasMany(Orders::class);
// }

protected $table = 'dishes';
protected $guarded = [];
}
