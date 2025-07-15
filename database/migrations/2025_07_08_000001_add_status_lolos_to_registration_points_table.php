<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('registration_points', function (Blueprint $table) {
            $table->boolean('status_lolos')->default(0)->after('total_points');
        });
    }

    public function down()
    {
        Schema::table('registration_points', function (Blueprint $table) {
            $table->dropColumn('status_lolos');
        });
    }
};
