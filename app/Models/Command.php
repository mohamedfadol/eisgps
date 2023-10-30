<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;
    protected $table="commands";
    protected $primaryKey = "id";
    protected $fillable=[
        'traccar_command_id',
        'device_protocol',

    ];
}
