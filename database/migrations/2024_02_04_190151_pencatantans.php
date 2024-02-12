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
        Schema::create('pencatatan', function (Blueprint $table) {
            $table->id();
            $table->string('barang_id');
            $table->string('jumlah');
            $table->string('total');
            $table->string('user_id');
            $table->enum('status', ['lunas', 'belum_lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
