<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('contact_id');
            $table->mediumInteger('leave_id')->nullable();
            $table->string('leave_number')->nullable();
            $table->string('vacation_leave')->nullable();
            $table->string('sick_leave')->nullable();
            $table->string('total')->nullable();
            $table->string('year')->nullable();
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
        Schema::dropIfExists('credits');
    }
}
