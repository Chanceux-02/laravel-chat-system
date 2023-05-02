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
        Schema::create('chat_table', function (Blueprint $table) {
            $table->id('c_id');
            $table->string('gchat_name');
            $table->unsignedBigInteger('u_id');
            $table->unsignedBigInteger('p_id');
            $table->foreign('u_id')->references('u_id')->on('user_table')->onDelete('cascade');
            $table->foreign('p_id')->references('p_id')->on('profile_table')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_table');
    }
};
