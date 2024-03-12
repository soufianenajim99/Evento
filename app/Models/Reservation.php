<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Reservation extends Pivot
{
    use HasFactory;

    protected $fillable =[
        'client_id',
        'event_id',
        'validated_at',
    ];

    public $incrementing = true;
}