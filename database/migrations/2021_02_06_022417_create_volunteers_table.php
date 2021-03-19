<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id')->default(1);
            $table->mediumInteger('contact_id');
            $table->string('volunteers_organization')->nullable();
            $table->string('volunteers_from')->nullable();
            $table->string('volunteers_to')->nullable();
            $table->string('volunteers_number_of_hours')->nullable();
            $table->string('volunteers_nature_of_work')->nullable();
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
        Schema::dropIfExists('volunteers');
    }
}
