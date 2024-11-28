<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('pelanggans')) {
            Schema::create('pelanggans', function (Blueprint $table) {
                $table->string('id_pelanggan', 10)->primary();
                $table->string('nama_pelanggan', 50)->nullable();
                $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
                $table->string('no_hp', 15)->nullable();
                $table->string('alamat', 50)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
