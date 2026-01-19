<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'brand',
        'description',
        'price',
        'image_path',
        'category_id',
        'condition',
    ];
    const CONDITION_LABELS = [
        1 => '良好',
        2 => '目立った傷や汚れなし',
        3 => 'やや傷や汚れあり',
        4 => '状態が悪い',
    ];
    public function getConditionLabelAttribute()
    {
        return self::CONDITION_LABELS[$this->condition] ?? '不明';
    }
    use HasFactory;
    
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}