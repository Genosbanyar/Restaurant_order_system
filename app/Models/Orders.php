<?php

namespace App\Models;

use App\Models\Dishes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{

    public function dishes(): BelongsTo
{
    return $this->belongsTo(Dishes::class, 'dish_id');
}
    protected $table = 'orders';
    protected $guarded = [];
}
