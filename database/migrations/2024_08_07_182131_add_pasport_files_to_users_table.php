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
            $table->string('passport_photo_2')->nullable()->default(null)->after('passport_number');
            $table->string('passport_photo_1')->nullable()->default(null)->after('passport_number');
            $table->string('contract_photo')->nullable()->default(null)->after('passport_number');
            $table->string('employment_photo')->nullable()->default(null)->after('passport_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('passport_photo_2');
            $table->dropColumn('passport_photo_1');
            $table->dropColumn('contract_photo');
            $table->dropColumn('employment_photo');
        });
    }
};
