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
    Schema::create('audits', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')->constrained()->cascadeOnDelete();
        $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->nullOnDelete();
        $table->timestamp('scheduled_at');
        $table->timestamp('completed_at')->nullable();
        $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('scheduled');
        $table->text('findings')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
