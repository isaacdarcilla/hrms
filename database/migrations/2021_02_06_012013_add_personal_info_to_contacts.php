<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonalInfoToContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('birth_date')->nullable()->after('name_extension');
            $table->string('birth_place')->nullable()->after('birth_date');
            $table->string('sex')->nullable()->after('birth_place');
            $table->string('civil_status')->nullable()->after('sex');
            $table->string('height')->nullable()->after('civil_status');
            $table->string('weight')->nullable()->after('height');
            $table->string('blood_type')->nullable()->after('weight');
            $table->string('gsis_id')->nullable()->after('blood_type');
            $table->string('pagibig_id')->nullable()->after('gsis_id');
            $table->string('philhealth_id')->nullable()->after('pagibig_id');
            $table->string('sss_id')->nullable()->after('philhealth_id');
            $table->string('tin_id')->nullable()->after('sss_id');
            $table->string('agency_employee_id')->nullable()->after('tin_id');
            $table->string('citizenship')->nullable()->after('agency_employee_id');
            $table->string('telephone')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
        });
    }
}
