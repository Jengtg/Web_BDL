<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('idJob')->unique();
            $table->string('companyName');
            $table->string('jobtitle');
            $table->string('requirements');
            $table->string('salary');
            $table->date('dateopened');
            $table->date('dateexpired');
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('user_id'); // Add this line
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add this line
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_jobs');
    }
};
