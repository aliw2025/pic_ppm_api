<?php

namespace Database\Seeders;

use App\Models\TblPpmType;
use Illuminate\Database\Seeder;

class TblPpmTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $tp = new TblPpmType();
         $tp->ppm_type_name = 'weekly';
         $tp->save();   

         $tp = new TblPpmType();
         $tp->ppm_type_name = 'monthly';
         $tp->save(); 

         $tp = new TblPpmType();
         $tp->ppm_type_name = 'quarterly';
         $tp->save(); 

         $tp = new TblPpmType();
         $tp->ppm_type_name = 'Bi-Annually';
         $tp->save(); 

         $tp = new TblPpmType();
         $tp->ppm_type_name = 'Annually';
         $tp->save(); 
         

         
         


    }

}
