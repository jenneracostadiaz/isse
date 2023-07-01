<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Invoice;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->enum('status', [Invoice::PENDING, Invoice::GENERATED, Invoice::PAID, Invoice::UNPAID])->default(Invoice::PENDING);
            $table->string('xml')->nullable();
            $table->string('pdf')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('company_id');

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
