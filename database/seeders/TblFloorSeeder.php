<?php

namespace Database\Seeders;

use App\Models\TblFloor;
use Illuminate\Database\Seeder;

class TblFloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $floor1 = new TblFloor();
        $floor1->floor_name='1st Floor';
        $floor1->save();

        $floor2 = new TblFloor();
        $floor2->floor_name='2nd Floor';
        $floor2->save();

        $floor3 = new TblFloor();
        $floor3->floor_name='third Floor';
        $floor3->save();

        $floor4 = new TblFloor();
        $floor4->floor_name='4th Floor';
        $floor4->save();

        $floor0 = new TblFloor();
        $floor0->floor_name='Basement';
        $floor0->save();


    }
}
