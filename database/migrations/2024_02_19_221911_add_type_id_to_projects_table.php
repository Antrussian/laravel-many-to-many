<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable(); // Aggiunge la colonna type_id
            $table->foreign('type_id')->references('id')->on('types'); // Definisce la foreign key
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['type_id']); // Rimuove la foreign key
            $table->dropColumn('type_id'); // Rimuove la colonna
        });
    }
    
};
