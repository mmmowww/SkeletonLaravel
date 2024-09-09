<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table(User::TABLE, function (Blueprint $table) {
            $table->string(User::LOGIN)->nullable();
            $table->string(User::FIRST_NAME)->nullable();
            $table->string(User::LAST_NAME)->nullable();
            $table->string(User::MIDDLE_NAME)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
