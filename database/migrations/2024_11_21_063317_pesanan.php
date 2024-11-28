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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->string('id_pesanan', 10)->primary();
            $table->string ('id_menu', 10)->foreign('id_menu')->references('id_menu')->on('menus')->onDelete('cascade');
            $table->string('id_pelanggan', 10)->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans')->onDelete('cascade');
            $table->string('id_meja', 10)->foreign('id_meja')->references('id_meja')->on('mejas')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('id_user')->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
