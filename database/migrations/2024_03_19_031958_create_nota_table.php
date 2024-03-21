<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('notas', function (Blueprint $table) {
        $table->id(); // This creates an auto-incrementing primary key
        $table->string('nota_path');
        $table->unsignedBigInteger('id_supir'); // Assuming id_supir is a foreign key, it should be an unsignedBigInteger
        $table->foreign('id_supir')->references('id')->on('supirs'); // Assuming 'supir' is the referenced table name
        $table->date('tanggal');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota');
    }
}
