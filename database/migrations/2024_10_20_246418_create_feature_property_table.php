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
        Schema::create('feature_property', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('property_id')->constrained()->onDelete('restrict'); // Tipo de propiedad
            $table->foreignId('feature_id')->constrained()->onDelete('restrict'); // Tipo de propiedad
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_property');
    }
};
