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
        Schema::table('users', function (Blueprint $table) {
            $table->string('bank_number')->nullable()->default(null)->after('passport_number');
            $table->string('bank_bic')->nullable()->default(null)->after('passport_number');
            $table->string('bank_name')->nullable()->default(null)->after('passport_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('bank_number');
            $table->dropColumn('bank_bic');
            $table->dropColumn('bank_name');
        });
    }
};
