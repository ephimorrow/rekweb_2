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
        // Add is_admin column to users table
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('password');
        });

        // Create seminars table
        Schema::create('seminars', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('location', 255)->nullable();
            $table->dateTime('datetime');
            $table->enum('type', ['skripsi', 'umum', 'workshop']);
            $table->timestamps();
        });

        // Create participants table
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim')->nullable();
            $table->string('prodi')->nullable();
            $table->timestamps();
        });

        // Create registrations table
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminar_id')->constrained()->onDelete('cascade');
            $table->foreignId('participant_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['terdaftar', 'tidak_terdaftar'])->default('terdaftar');
            $table->timestamps();
            
            // Prevent duplicate registrations
            $table->unique(['seminar_id', 'participant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('participants');
        Schema::dropIfExists('seminars');
        
        // Remove is_admin column from users
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};