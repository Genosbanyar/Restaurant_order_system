<?php

namespace App\Models;

use App\Models\Dishes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function dishes(): HasMany
    {
        return $this->hasMany(Dishes::class);
    }
}
