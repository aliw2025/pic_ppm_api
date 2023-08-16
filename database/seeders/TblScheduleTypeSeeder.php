<?php

namespace Database\Seeders;

use App\Models\TblScheduleType;
use Illuminate\Database\Seeder;

class TblScheduleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $st = new TblScheduleType();
        $st->name = 'timely';
        $st->is_active = 1;
        $st->save();
        
        $st = new TblScheduleType();
        $st->name='metered';
        $st->is_active = 1;
        $st->save();
        
        
        
    }
}
