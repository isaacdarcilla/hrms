<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResidentialToContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('residential_block')->nullable()->after('telephone');
            $table->string('residential_street')->nullable()->after('residential_block');
            $table->string('residential_village')->nullable()->after('residential_street');
            $table->string('residential_barangay')->nullable()->after('residential_village');
            $table->string('residential_city')->nullable()->after('residential_barangay');
            $table->string('residential_province')->nullable()->after('residential_city');
            $table->string('residential_zipcode')->nullable()->after('residential_province');

            $table->string('permanent_block')->nullable()->after('telephone');
            $table->string('permanent_street')->nullable()->after('permanent_block');
            $table->string('permanent_village')->nullable()->after('permanent_street');
            $table->string('permanent_barangay')->nullable()->after('permanent_village');
            $table->string('permanent_city')->nullable()->after('permanent_barangay');
            $table->string('permanent_province')->nullable()->after('permanent_city');
            $table->string('permanent_zipcode')->nullable()->after('permanent_province');
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
