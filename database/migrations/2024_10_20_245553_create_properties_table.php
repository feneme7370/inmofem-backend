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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            // Información básica de la propiedad
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->string('uuid', 255)->unique();
            $table->longText('description')->nullable();
            $table->decimal('price', 20, 2); // Para valores monetarios

            // Ubicación
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('maps')->nullable();

            // Detalles de la propiedad
            $table->tinyInteger('bedrooms')->default(1);
            $table->tinyInteger('bathrooms')->default(1);
            $table->tinyInteger('garage')->default(1);
            $table->tinyInteger('yard')->default(1);
            $table->decimal('size', 8, 2)->nullable(); // Tamaño de la propiedad (por ejemplo, en metros cuadrados)

            // Foreign keys
            $table->foreignId('money_id')->constrained()->onDelete('restrict'); // Tipo de propiedad
            $table->foreignId('method_id')->constrained()->onDelete('restrict'); // Tipo de propiedad
            $table->foreignId('property_type_id')->constrained('property_types')->onDelete('restrict'); // Tipo de propiedad
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('set null'); // Empresa que gestiona la propiedad
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Usuario que creó la propiedad

            // Otras opciones
            $table->tinyInteger('status')->default(1);

            // Timestamps y soft deletes
            $table->datetime('deleted_at')->nullable()->default(null);
            $table->timestamps();

            // Índices
            $table->index(['city', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
