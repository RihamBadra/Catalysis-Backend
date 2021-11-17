<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'card_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany(Session::class,'card_id','id');
    }

    public function enrolledUsers()
    {
        return $this->hasMany(UserCard::class, 'card_id', 'id');
    }

    public function hidden()
    {
        return $this->hasMany(Hidden::class, 'card_id', 'id');
    }

    public function savedClass()
    {
        return $this->hasMany(Saved::class, 'card_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'card_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'card_id','id');
    }
}
