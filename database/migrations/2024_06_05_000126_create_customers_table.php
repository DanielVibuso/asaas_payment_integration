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
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('cpfCnpj');
            $table->string('idAsaas')->nullable()->comment('this field depends of asaas Api response to be filled');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobilePhone')->nullable();
            $table->string('address')->nullable();
            $table->string('addressNumber')->nullable();
            $table->string('complement')->nullable();
            $table->string('province')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('notificationDisabled')->nullable();
            $table->string('additionalEmails')->nullable();
            $table->string('municipalInscription')->nullable();
            $table->string('stateInscription')->nullable();
            $table->string('observations')->nullable();
            $table->string('groupName')->nullable();
            $table->string('company')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
