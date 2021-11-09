<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function cards()
    {
        return $this->hasMany(Card::class, 'category_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(UserCategory::class, 'category_id', 'id');
    }
}
