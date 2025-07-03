<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('spendings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->date('spending_date');
            $table->decimal('value', 12, 2);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('spendings');
    }
};
