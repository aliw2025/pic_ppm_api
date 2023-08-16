<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TblVendorPersonType;

class TblVendorPersonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $person = new TblVendorPersonType();
        $person->pserson_type_name = 'primary';
        $person->save();
        $person = new TblVendorPersonType();
        $person->pserson_type_name = 'secondary';
        $person->save();
        $person = new TblVendorPersonType();
        $person->pserson_type_name = 'support';
        $person->save();
    }
}
