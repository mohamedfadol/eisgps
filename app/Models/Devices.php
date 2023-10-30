<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;
    protected $table="devices";
    protected $primaryKey = "id";
    protected $fillable=[
        'traccar_device_id',
        'unique_id',
        'owner_id',
    ];

    public function Owner()
    {
        $usr = User::find($this->owner_id);
        if($usr){
            if($usr->accountType == 2){
                return $usr->name;
            }else{
                $company = Facility::where('owner_id',$this->owner_id)->first();
                return $company->short_name_ar;
            }
        }else{
            return null;
        }
    }
}
