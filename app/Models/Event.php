<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'date',
        'nbrPlacesDispo',
        'price',
        'picture',
        'lieu',
        'Validation_type',
        'user_id',
        'category_id'
    ];

    protected $attributes = [
        'validated_at'=> null
    ];
    protected $dates = ['created_at', 'updated_at', 'validated_at'];

    public function category() {
        return $this->belongsTo(Categorie::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}