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
        Schema::create('all_pictures', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 255)->unique();
            $table->string('path_jpg');
            $table->string('path_jpg_tumb');
            $table->string('imageable_type');
            $table->unsignedBigInteger('imageable_id');
            $table->string('type'); // Agregamos el campo 'type' para diferenciar los tipos de imagen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_pictures');
    }
};
