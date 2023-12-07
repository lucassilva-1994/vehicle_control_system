<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table = 'companies';
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('order');
            $table->string('legal_name');
            $table->string('trade_name');
            $table->string('cnpj',19);
            $table->string('state_registration')->nullable();
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('mobile_phone')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
