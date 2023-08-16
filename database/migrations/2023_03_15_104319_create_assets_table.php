<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
           
            $table->string('equipment_category_name')->nullable();
            $table->string('equipment_type')->nullable();;
            $table->string('manufacturer')->nullable();;
            $table->string('model')->nullable();;
            $table->string('serial_number')->nullable();;
            $table->string('fa_number')->nullable();;
            $table->string('equipment_sequence_number')->nullable();;
            $table->date('manufacture_date')->nullable();;
            $table->date('installation_date')->nullable();
            $table->string('manual_file_path')->nullable();
            $table->string('room_area')->nullable();
            $table->string('section')->nullable();
            $table->string('sub_section')->nullable();
            $table->string('custodian_name')->nullable();
            $table->string('office_extention')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->date('last_ppm_date')->nullable();
            $table->date('next_ppm_date')->nullable();
            $table->timestamps();
            
            $table->unsignedBigInteger('asset_technical_category')->nullable();
            $table->unsignedBigInteger('equipment_status')->nullable();
            $table->unsignedBigInteger('vendor')->nullable();
            $table->unsignedBigInteger('building_block')->nullable();
            $table->unsignedBigInteger('floor')->nullable();
            $table->unsignedBigInteger('department')->nullable();
            $table->unsignedBigInteger('ppm_type')->nullable();

            
            // $table->foreign('asset_technical_category')->references('id')->on('tbl_departments')->onDelete('cascade');
            // $table->foreign('equipment_status')->references('id')->on('tbl_equipment_statuses')->onDelete('cascade');
            // $table->foreign('vendor')->references('id')->on('vendors')->onDelete('cascade');
            // $table->foreign('building_block')->references('id')->on('tbl_building_blocks')->onDelete('cascade');
            // $table->foreign('floor')->references('id')->on('tbl_floors')->onDelete('cascade');
            // $table->foreign('department')->references('id')->on('tbl_departments')->onDelete('cascade');
            // $table->foreign('ppm_type')->references('id')->on('tbl_ppm_types')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
