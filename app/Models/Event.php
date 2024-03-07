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
        'typeVali',
        'validated_at',
        'user_id',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Categorie::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}