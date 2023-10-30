<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simcards extends Model
{
    use HasFactory;

    protected $table = "simcards";
    protected $primaryKey ="id";
    protected $fillable=[
        'id',
        'iccid',
        'status',
        'activated_date',
        'date_added',
        'device_id',
        'usage',
        'in_session',
        'msisdn',
        'rate_plan',
        'usage_limit_reached',
        'imsi'
    ];
}
