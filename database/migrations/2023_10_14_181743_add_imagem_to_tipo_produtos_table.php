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
        Schema::table('tipo_produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_imagem')->nullable();
            $table->foreign('id_imagem')->nullable()->references('id')->on('imagens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['id_imagem']);
            $table->dropColumn('id_imagem');
        });
    }
};
