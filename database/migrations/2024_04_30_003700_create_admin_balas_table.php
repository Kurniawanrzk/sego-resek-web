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
        Schema::create('admin_balas', function (Blueprint $table) {
            $table->foreignId("id_admin")
            ->references("id_admin")
            ->on("admins")
            ->onUpdate("cascade")
            ->onDelete("cascade");
            $table->foreignId("id_komentar_admin")
            ->references("id_komen")
            ->on("komen")
            ->onUpdate("cascade")
            ->onDelete("cascade");
            $table->foreignId("id_komentar_pengunjung")
            ->references("id_komen")
            ->on("komen")
            ->onUpdate("cascade")
            ->onDelete("cascade");
            $table->foreignId("id_menu")
            ->references("id_menu")
            ->on("menu")
            ->onUpdate("cascade")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_balas');
    }
};
