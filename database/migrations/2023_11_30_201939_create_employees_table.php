<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table = 'employees';
    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('order');
            $table->string('name',100);
            $table->string('cpf')->unique();
            $table->string('email',100)->unique();
            $table->foreignUuid('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreignUuid('job_title_id')->references('id')->on('job_titles')->onDelete('cascade');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
