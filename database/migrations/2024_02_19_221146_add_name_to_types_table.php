<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToTypesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->string('name')->after('id'); // Aggiunge la colonna 'name' dopo la colonna 'id'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->dropColumn('name'); // Rimuove la colonna 'name' in caso di rollback
        });
    }
}

