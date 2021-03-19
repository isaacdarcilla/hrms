<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('account_id')->default(1);
            $table->mediumInteger('job_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('sur_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('qualification_experience')->nullable();
            $table->string('qualification_eligibility')->nullable();
            $table->string('resume')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
