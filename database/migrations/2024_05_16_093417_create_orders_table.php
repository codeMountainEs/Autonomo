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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('n_docu')->nullable();
            $table->string('description')->nullable();
            $table->string('ubication')->nullable();
            $table->integer('price')->nullable();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->text('image')->nullable();
            $table->enum('type',
                              ['Income','Expense']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
