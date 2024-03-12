<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function events():BelongsToMany
    {
        return $this->belongsToMany(Event::class,'reservation')->withPivot('validated_at')->as('reservation')->withTimestamps()->using(Reservation::class);
    }
   
}