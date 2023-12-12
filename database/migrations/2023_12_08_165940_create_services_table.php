<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table = 'services';
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('order');
            $table->string('description',250);
            $table->decimal('value');
            $table->foreignUuid('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreignUuid('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('executed_by')->references('id')->on('employees')->onDelete('cascade');
            $table->foreignUuid('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
