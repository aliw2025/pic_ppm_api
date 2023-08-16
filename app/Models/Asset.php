<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TblDepartment;


class Asset extends Model
{
    use HasFactory;

    public function assetTechnicalCategory(){

        return $this->hasOne(TblDepartment::class,'id','asset_technical_category');

    }
    public function assetImages(){

        // $this->hasMany()
        return $this->hasMany(TblAssetImages::class,'asset_id');

    }
    public function schedule(){

        return $this->hasOne(PpmSchedule::class,'asset_id');
    }
    
    public function scheduleEntries(){

        
        return $this->hasMany(AssetPpm::class,'asset_id');
    }
    
}
