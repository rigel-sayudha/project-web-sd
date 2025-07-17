<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('penghasilan_ayah')->nullable()->after('pekerjaan_ayah');
            $table->string('penghasilan_ibu')->nullable()->after('pekerjaan_ibu');
            $table->string('status_pip')->nullable()->after('penghasilan_ibu');
            $table->string('file_kk')->nullable()->after('status_pip');
            $table->string('file_akta')->nullable()->after('file_kk');
        });
    }
    public function down(): void
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn(['penghasilan_ayah','penghasilan_ibu','status_pip','file_kk','file_akta']);
        });
    }
};
