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
        Schema::create('profile_table', function (Blueprint $table) {
            $table->id('p_id');
            $table->unsignedBigInteger('u_id');
            $table->foreign('u_id')->references('u_id')->on('user_table')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->longText('bio');
            $table->integer('age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_table');
    }
};
