<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('telepon_ortu')->nullable()->after('nama_ibu');
            $table->string('nama_wali')->nullable()->after('file_akta');
            $table->string('alamat_wali')->nullable()->after('nama_wali');
            $table->string('no_telp_wali')->nullable()->after('alamat_wali');
            $table->string('pekerjaan_wali')->nullable()->after('no_telp_wali');
        });
    }
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn(['telepon_ortu','nama_wali','alamat_wali','no_telp_wali','pekerjaan_wali']);
        });
    }
};
