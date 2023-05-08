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
        Schema::create('messages_table', function (Blueprint $table) {
            $table->id('m_id');
            $table->unsignedBigInteger('p_id');
            $table->unsignedBigInteger('c_id');
            $table->unsignedBigInteger('cm_id');
            $table->unsignedBigInteger('receiver_id')->after('p_id');
            $table->foreign('receiver_id')->references('p_id')->on('profile_table')->onDelete('cascade');
            $table->foreign('p_id')->references('p_id')->on('profile_table')->onDelete('cascade');
            $table->foreign('c_id')->references('c_id')->on('chat_table')->onDelete('cascade');
            $table->foreign('cm_id')->references('cm_id')->on('chat_member_table')->onDelete('cascade')->nullable();
            $table->longText('image_path');
            $table->longText('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages_table');
    }
};
