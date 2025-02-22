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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->string('lieu'); 
            $table->decimal('latitude', 10, 7); 
            $table->decimal('longitude', 10, 7);
            $table->dateTime('date_heure');
            $table->string('categorie'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->integer('max_participants')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
