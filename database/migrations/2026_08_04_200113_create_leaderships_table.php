<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('leaderships', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('slug')->unique();
            $table->string('title');           // e.g., Executive Chairman, Vice Chairman
            $table->string('portfolio')->nullable(); // for Supervisory Councillors
            $table->text('biography')->nullable();
            $table->longText('welcome_message')->nullable(); // only for Chairman
            $table->string('image_path')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leaderships');
    }
};
