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
        Schema::table('forms', function (Blueprint $table) {
            $table->renameColumn('sign', 'sign');
            $table->renameColumn('sPosition', 'sPosition');
            $table->renameColumn('sName', 'sName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->renameColumn('sign', 'sign');
            $table->renameColumn('sPosition', 'sPosition');
            $table->renameColumn('sName', 'sName');
        });
    }
};
