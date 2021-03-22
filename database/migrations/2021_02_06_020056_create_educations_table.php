<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id')->default(1);
            $table->mediumInteger('contact_id');
            $table->string('education_level')->nullable();
            $table->string('education_school_name')->nullable();
            $table->string('education_course')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('education_highest_level_earned')->nullable();
            $table->string('education_year_graduated')->nullable();
            $table->string('education_honors_received')->nullable();
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
        Schema::dropIfExists('educations');
    }
}
