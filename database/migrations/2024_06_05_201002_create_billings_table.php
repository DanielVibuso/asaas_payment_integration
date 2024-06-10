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
        Schema::create('billings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('idAsaas')->nullable()->comment('this field depends of asaas Api response to be filled');
            $table->foreignUuid('customer_id')->nullable()->constrained()->onDelete('cascade');
            $table->float('value');
            $table->string('billingType');
            $table->string('status')->nullable();
            $table->string('product')->nullable();
            $table->string('bankSlipUrl')->nullable();
            $table->datetime('dueDate')->nullable();
            $table->datetime('paymentDate')->nullable();
            $table->string('invoiceUrl')->nullable();
            $table->string('invoiceNumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
