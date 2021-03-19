<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('account_id')->default(1);
            $table->string('position')->nullable();
            $table->string('item_number')->nullable();
            $table->string('department')->nullable();
            $table->string('education')->nullable();
            $table->string('experience')->nullable();
            $table->string('training')->nullable();
            $table->string('eligibility')->nullable();
            $table->string('job_description')->nullable();
            $table->string('salary_grade')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
