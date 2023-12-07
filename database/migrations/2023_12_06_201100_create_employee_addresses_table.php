<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table = 'employee_addresses';
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('order');
            $table->string('postcode',9);
            $table->string('street');
            $table->string('neighborhood')->nullable();
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('city');
            $table->string('state',2);
            $table->foreignUuid('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
