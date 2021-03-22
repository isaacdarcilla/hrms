<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('leave_hr_approving_name')->default('Ma. Sionne May T. Crispino')->nullable();
            $table->string('leave_hr_approving_position')->default('Administrative Officer V')->nullable();
            $table->string('leave_hr_approving_office')->default('HRM Services')->nullable();
            $table->string('leave_vp_approving_name')->default('Ma. Theresa E. Sarmiento, MBA')->nullable();
            $table->string('leave_vp_approving_position')->default('VP-Administrative and Financial Affairs')->nullable();
            $table->string('leave_vp_approving_office')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
