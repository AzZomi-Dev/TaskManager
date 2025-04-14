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
            $table->string('task');
            $table->timestamps();
            
            // Add the foreign key for the user
            $table->foreignId('user_id')  
                  ->constrained()         // Automatically references the 'users' table
                  ->onDelete('cascade');
            
            // Additional fields
            $table->timestamp('start_time')->nullable();  // Add start_time
            $table->timestamp('completed_at')->nullable(); // Add completed_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');  // This will drop the entire tasks table
    }
};
