<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    protected $table="groups";
    protected $primaryKey = "id";
    protected $fillable=[
        'traccar_group_id',
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
                return $company->manager_name;
            }
        }else{
            return null;
        }
    }
}
