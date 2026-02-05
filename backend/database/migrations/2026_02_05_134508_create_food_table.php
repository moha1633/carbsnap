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
    Schema::create('foods', function (Blueprint $table) {
        $table->id();

        $table->string('name_en');                 // "Rice"
        $table->string('name_local')->nullable();  // "Bariis"
        $table->enum('category', ['food', 'drink'])->default('food');

        $table->string('region')->nullable();      // "Somali", "Indian", "Global"
        $table->string('serving_label');           // "1 cup", "1 piece", "250 ml"
        $table->decimal('carbs_per_serving', 6, 2); // e.g. 45.50 grams

        $table->timestamps();

        $table->index(['category']);
        $table->index(['region']);
        $table->index(['name_en']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
