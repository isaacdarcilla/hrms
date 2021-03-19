<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_settings', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('contact_id');
            $table->string('officer_in_charge')->nullable();
            $table->string('officer_in_charge_position')->nullable();
            $table->string('department')->nullable();
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_settings');
    }
}
