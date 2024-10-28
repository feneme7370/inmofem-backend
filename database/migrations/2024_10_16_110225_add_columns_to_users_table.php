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
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname', 100); 
            $table->string('slug', 255);  
            $table->string('phone', 30)->nullable();
            $table->date('birthday')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('city', 100)->nullable();  
            $table->string('social', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('uuid', 255)->unique();
            $table->tinyInteger('status')->default(1);
            $table->foreignId('company_id')->nullable()->constrained()->onUpdate('cascade')->restrictOnDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('slug');
            $table->dropColumn('phone');
            $table->dropColumn('birthday');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('social');
            $table->dropColumn('description');
            $table->dropColumn('status');

            $table->dropForeign(['company_id']); 
            $table->dropColumn('company_id');
        });
    }
};
