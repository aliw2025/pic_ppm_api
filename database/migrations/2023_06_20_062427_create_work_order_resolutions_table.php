<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrderResolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_order_resolutions', function (Blueprint $table) {
            $table->id();
            $table->longText('resolution')->nullable();
            $table->unsignedBigInteger('work_order_id')->nullable();
            $table->timestamps();
            $table->foreign('work_order_id')->references('id')->on('work_orders')->onDelete('cascade');   
                   

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_order_resolutions');
    }
}
