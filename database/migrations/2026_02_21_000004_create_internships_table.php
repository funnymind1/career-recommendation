<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('company');
            $table->string('role');
            $table->string('location');
            $table->string('category')->default('Tech Roles');
            $table->string('status')->default('live');
            $table->date('deadline');
            $table->string('duration')->nullable();
            $table->text('details')->nullable();
            $table->string('apply_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
