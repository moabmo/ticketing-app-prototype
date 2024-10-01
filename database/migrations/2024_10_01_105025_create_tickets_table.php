<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('subject');
        $table->text('description');
        $table->enum('status', ['open', 'in_progress', 'closed'])->default('open');
        $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
        $table->string('category')->nullable();
        $table->string('attachment')->nullable();  // For file uploads
        $table->timestamp('reported_at');
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
