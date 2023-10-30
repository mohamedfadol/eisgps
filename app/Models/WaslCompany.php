<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaslCompany extends Model
{
    use HasFactory;
    protected $table="wasl_companies";
    protected $primaryKey="id";
    protected $fillable=[
        'traccar_id',
        'wasl_company_id',
    ];


}
