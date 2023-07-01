<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Quote;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->enum('status', [Quote::PENDING, Quote::REVIEWING, Quote::APPROVED, Quote::IN_PROGRESS, Quote::COMPLETED])->default(Quote::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
