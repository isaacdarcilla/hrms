<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('contact_id');
            $table->string('leave_number')->nullable();
            $table->string('agency')->default('Catanduanes State University');
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_initial')->nullable();
            $table->string('date_of_filing')->nullable();
            $table->string('position')->nullable();
            $table->string('monthly_salary')->nullable();
            $table->string('type_of_leave')->nullable();
            $table->string('vacation_leave_location')->nullable();
            $table->string('sick_leave_location')->nullable();
            $table->string('number_of_working_days')->nullable();
            $table->string('start_of_inclusive_date')->nullable();
            $table->string('end_of_inclusive_date')->nullable();
            $table->string('commutation')->nullable();
            $table->string('certification_of_leave_credits')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('approved_for')->nullable();
            $table->string('disapproved_due_to')->nullable();
            $table->string('officer_in_charge_name')->nullable();
            $table->string('officer_in_charge_position')->nullable();
            $table->string('office')->nullable();
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
        Schema::dropIfExists('leaves');
    }
}
