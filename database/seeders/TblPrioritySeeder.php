<?php

namespace Database\Seeders;

use App\Models\TblPriority;
use Illuminate\Database\Seeder;

class TblPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $priority = new TblPriority();
        $priority->priority = "low";
        $priority->is_active = 1;
        $priority->save();

        
        $priority = new TblPriority();
        $priority->priority = "medium";
        $priority->is_active = 1;
        $priority->save();

        
        $priority = new TblPriority();
        $priority->priority = "High";
        $priority->is_active = 1;
        $priority->save();
    }
}
