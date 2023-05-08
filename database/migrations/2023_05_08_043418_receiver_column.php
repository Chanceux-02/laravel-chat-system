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
        Schema::table('messages_table', function (Blueprint $table) {
            $table->unsignedBigInteger('receiver_id')->after('p_id');
            $table->foreign('receiver_id')->references('p_id')->on('profile_table')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages_table', function (Blueprint $table) {
            $table->dropColumn('receiver_id');
        });
    }
};
