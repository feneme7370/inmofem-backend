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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->string('uuid', 255)->unique();
            $table->decimal('price', 20, 2);
            $table->text('description', 500)->nullable();
            $table->text('short_description', 500)->nullable();
            $table->integer('max_properties')->default(0);
            $table->integer('max_images')->default(0);
            $table->integer('max_type_properties')->default(0);
            $table->integer('max_features')->default(0);
            $table->integer('max_tags')->default(0);
            $table->integer('max_suggestions')->default(0);
            $table->tinyInteger('status')->default(1); // 1 activo - 0 inactivo
            $table->date('deleted_at')->nullable()->default(null);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
