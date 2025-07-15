<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up() {
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->enum('tipe', ['foto', 'video']);
            $table->string('file');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('galeri');
    }
};
