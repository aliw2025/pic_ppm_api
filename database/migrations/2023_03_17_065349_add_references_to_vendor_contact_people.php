<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferencesToVendorContactPeople extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendor_contact_people', function (Blueprint $table) {
            //
            $table->foreign('person_type')->references('id')->on('tbl_vendor_person_types')->onDelete('cascade');
            $table->foreign('vendor')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendor_contact_people', function (Blueprint $table) {
            //
        });
    }
}
