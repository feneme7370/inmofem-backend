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
        Schema::create('property_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // Ej. apartamento, casa, local comercial
            $table->string('slug', 255)->unique();
            $table->string('uuid', 255)->unique();
            $table->longText('description')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->restrictOnDelete();
            $table->foreignId('company_id')->nullable()->constrained()->onUpdate('cascade')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_types');
    }
};
