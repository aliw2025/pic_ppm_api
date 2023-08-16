<?php

namespace Database\Seeders;

use App\Models\TblWoParty;
use Illuminate\Database\Seeder;

class TblWoPartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = new TblWoParty();
        $status->name = "self";
        $status->is_active = 1;
        $status->save();

        $status = new TblWoParty();
        $status->name = "vendor";
        $status->is_active = 1;
        $status->save();
    }
}
