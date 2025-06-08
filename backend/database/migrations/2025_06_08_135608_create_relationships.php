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
        Schema::table('company_events', function (Blueprint $table) {
            // Убедись, что тип поля совместим: unsignedBigInteger
            $table->foreign('company_id')
                  ->references('id')->on('companies')
                  ->onDelete('cascade');
        });
        Schema::table('events', function (Blueprint $table){
            $table->foreign('event_type_id')
            ->references('id')
            ->on("company_events")
            ->onDelete('cascade');

            $table->foreign('company_id')
            ->references('id')
            ->on('companies')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_events', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['event_type_id']);
            $table->dropForeign(['company_id']);
        });
    }
};
