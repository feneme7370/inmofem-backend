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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->string('email', 255)->unique();
            $table->string('address', 255)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('url')->nullable();
            $table->text('description', 500)->nullable();
            $table->text('hero_description', 500)->nullable();
            $table->text('time_description', 500)->nullable();
            $table->text('short_description', 500)->nullable();

            $table->string('image_cover_path', 2048)->nullable();
            $table->string('image_logo_path', 2048)->nullable();
            $table->string('image_qr_path', 2048)->nullable();

            $table->tinyInteger('status')->default(1); // 1 activo - 0 inactivo
            $table->foreignId('membership_id')->nullable()->constrained()->onUpdate('cascade')->restrictOnDelete();
            $table->datetime('deleted_at')->nullable()->default(null);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
