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
        Schema::create('ingredient_recettes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('ingredient_name');
            $table->foreignIdFor(\App\Models\Recette::class);
            $table->foreignIdFor(\App\Models\Ingredient::class);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_recettes');
    }
};
