<?php

namespace Database\Seeders;

use App\Models\TblWorkOrderStatus;
use Illuminate\Database\Seeder;

class tblWorkOrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $status = new TblWorkOrderStatus();
        $status->name = "Draft";
        $status->is_active = 1;
        $status->save();
        
        $status = new TblWorkOrderStatus();
        $status->name = "Pending";
        $status->is_active = 1;
        $status->save();

        $status = new TblWorkOrderStatus();
        $status->name = "Deffered";
        $status->is_active = 1;
        $status->save();

        $status = new TblWorkOrderStatus();
        $status->name = "On Hold";
        $status->is_active = 1;
        $status->save();

        $status = new TblWorkOrderStatus();
        $status->name = "Assigned";
        $status->is_active = 1;
        $status->save();

        $status = new TblWorkOrderStatus();
        $status->name = "In Progress";
        $status->is_active = 1;
        $status->save();

        $status = new TblWorkOrderStatus();
        $status->name = "Completed";
        $status->is_active = 1;
        $status->save();

        $status = new TblWorkOrderStatus();
        $status->name = "Closed";
        $status->is_active = 1;
        $status->save();

        
    }
}
