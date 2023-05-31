<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depositors', function (Blueprint $table) {
            $table->string('depositors_branche')->nullable()->default(null)->comment('สาขา');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('depositors', function (Blueprint $table) {
            $table->dropColumn('depositors_branche');
        });
    }
};
