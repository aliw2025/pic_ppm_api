<?php

namespace Database\Seeders;

use App\Models\TblBuildingBlock;
use Illuminate\Database\Seeder;

class TblBuildingBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $block1 = new TblBuildingBlock();
        $block1->building_block_name = "IPD";
        $block1->save();

        $block2 = new TblBuildingBlock();
        $block2->building_block_name = "OPD";
        $block2->save();


    }
}
