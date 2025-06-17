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
        Schema::table('events', function(Blueprint $table){
            $table->string('disk')->default('events');
            $table->string('file_name')->nullable(false);
            $table->dropColumn('payload_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function(Blueprint $table){
            $table->text("payload_link");
            $table->dropColumn('disk');
            $table->dropColumn('file_name');


            
        });
    }
};
