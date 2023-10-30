<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaslDriver extends Model
{
    use HasFactory;

    protected $table="wasl_drivers";
    protected $primaryKey="id";
    protected $fillable=[
        'traccar_id',
        'traccar_driver_id',
        'wasl_driver_id',
    ];
}
