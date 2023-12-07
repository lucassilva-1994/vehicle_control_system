<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table = 'users';
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('order');
            $table->string('name');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->boolean('isAdmin')->default(0);
            $table->foreignUuid('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
