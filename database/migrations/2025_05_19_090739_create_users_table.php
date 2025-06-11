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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('tc_no', 11)->unique(); // TC Kimlik No (11 haneli)
            $table->string('name');
            $table->string('surname');
            $table->date('birth_date');
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->boolean('is_verified')->default(false); // doğrulama durumu
            $table->foreignId('institution_id')->nullable()->constrained('institutions')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
