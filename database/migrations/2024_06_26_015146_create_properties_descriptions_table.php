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
        Schema::create('properties_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('owner', 50);
            $table->string('phone_number', 255);
            $table->string('gmail');
            $table->decimal('acreage', 10, 2);
            $table->string('price', 50);
            $table->decimal('frontage', 5, 2)->nullable();
            $table->string('house_direction', 20)->nullable();
            $table->integer('floors')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('toilets')->nullable();
            $table->string('legality', 50)->nullable();
            $table->string('furniture', 255)->nullable();
            $table->text('other_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_descriptions');
    }
};
