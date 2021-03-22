<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id')->default(1);
            $table->mediumInteger('contact_id');
            $table->string('eligibility_name')->nullable();
            $table->string('eligibility_rating')->nullable();
            $table->string('eligibility_date_of_exam')->nullable();
            $table->string('eligibility_place_of_exam')->nullable();
            $table->string('eligibility_license_number')->nullable();
            $table->string('eligibility_license_expiration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
