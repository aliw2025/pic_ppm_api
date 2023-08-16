<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_contact_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor')->nullable();
            $table->unsignedBigInteger('person_type')->nullable();
            $table->string('designation')->nullable();
            $table->string('email')->nullable();
            $table->string('landline')->nullable();
            $table->string('mobile')->nullable();
            $table->timestamps();

            // $table->foreign('person_type')->references('id')->on('tbl_vendor_person_types')->onDelete('cascade');
            // $table->foreign('vendor')->references('id')->on('vendors')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_contact_people');
    }
}
