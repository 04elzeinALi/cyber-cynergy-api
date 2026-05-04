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
    Schema::create('incidents', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')->constrained()->cascadeOnDelete();
        $table->foreignId('reported_by_user_id')->nullable()->constrained('users')->nullOnDelete();
        $table->foreignId('assigned_to_user_id')->nullable()->constrained('users')->nullOnDelete();
        $table->string('title');
        $table->text('description')->nullable();
        $table->enum('severity', ['low', 'medium', 'high', 'critical'])->default('medium');
        $table->enum('status', ['open', 'investigating', 'resolved', 'closed'])->default('open');
        $table->timestamp('reported_at')->useCurrent();
        $table->timestamp('resolved_at')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
