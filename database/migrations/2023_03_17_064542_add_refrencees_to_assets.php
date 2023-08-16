<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefrenceesToAssets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            //
              
            $table->foreign('asset_technical_category')->references('id')->on('tbl_departments')->onDelete('cascade');
            $table->foreign('equipment_status')->references('id')->on('tbl_equipment_statuses')->onDelete('cascade');
            $table->foreign('vendor')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('building_block')->references('id')->on('tbl_building_blocks')->onDelete('cascade');
            $table->foreign('floor')->references('id')->on('tbl_floors')->onDelete('cascade');
            $table->foreign('department')->references('id')->on('tbl_departments')->onDelete('cascade');
            $table->foreign('ppm_type')->references('id')->on('tbl_ppm_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            //
        });
    }
}
