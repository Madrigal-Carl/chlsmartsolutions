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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->enum('title', ['technical support', 'maintenance', 'installation', 'troubleshooting assistance', 'device resets', 'usage guidance']);
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->longText('description')->nullable();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'completed', 'missed'])->default('pending');
            $table->date('expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
