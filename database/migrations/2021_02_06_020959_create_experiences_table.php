<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id')->default(1);
            $table->mediumInteger('contact_id');
            $table->string('experiences_from')->nullable();
            $table->string('experiences_to')->nullable();
            $table->string('experiences_position')->nullable();
            $table->string('experiences_company')->nullable();
            $table->string('experiences_monthly_salary')->nullable();
            $table->string('experiences_salary_grade')->nullable();
            $table->string('experiences_status_of_appointment')->nullable();
            $table->string('experiences_government')->nullable();
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
        Schema::dropIfExists('experiences');
    }
}
