<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
    protected $fillable = ['*'];



    public function asset()
    {
        return $this->belongsTo(Asset::class,'asset_id');
    }

    public function request_type()
    {
        return $this->belongsTo(TblRequestType::class,'request_type_id');
    }
    public function category()
    {
        return $this->belongsTo(TblServiceCategory::class,'category_id');
    }

    public function priority()
    {
        return $this->belongsTo(TblPriority::class,'priority_id');
    }

    public function status()
    {
        return $this->belongsTo(TblWorkOrderStatus::class,'status_id');
    }


    public function assigned_to()
    {
        return $this->belongsTo(TblWoParty::class,'party_type_id');
    }

    public function tasks(){
        return $this->hasMany(WorkOrder::class,'parent_id');
    }
    
    public function resolutions(){

        return $this->hasMany(WorkOrderResolution::class,'work_order_id');

    }
    public function Events(){

        return $this->hasMany(WorkOrderEvent::class,'work_order_id');

    }



}
