<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->integer('tes_warna')->default(0)->after('status_lolos');
            $table->integer('interaksi')->default(0)->after('tes_warna');
            $table->integer('tes_baca_tulis')->default(0)->after('interaksi');
            $table->integer('abk')->default(0)->after('tes_baca_tulis');
            $table->integer('total_poin')->default(0)->after('abk');
        });
    }

    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn(['tes_warna', 'interaksi', 'tes_baca_tulis', 'abk', 'total_poin']);
        });
    }
};
