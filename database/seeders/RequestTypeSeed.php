<?php

namespace Database\Seeders;

use App\Models\TblRequestType;
use Illuminate\Database\Seeder;

class RequestTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rt = new TblRequestType();
        $rt->name= "PM";
        $rt->save();

        $rt = new TblRequestType();
        $rt->name= "Incedent";
        $rt->save();

        $rt = new TblRequestType();
        $rt->name= "Complaint";
        $rt->save();

        $rt = new TblRequestType();
        $rt->name= "Self Assigned Task";
        $rt->save();

        $rt = new TblRequestType();
        $rt->name= "Task Assigned by Senior";
        $rt->save();

        $rt = new TblRequestType();
        $rt->name= "Request for Information";
        $rt->save();
        


    }
}
