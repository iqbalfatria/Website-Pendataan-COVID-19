<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendataansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
		Schema::create('pendataans', function (Blueprint $table) {
		$table->bigIncrements('id');
		$table->string('nama');
		$table->string('ttl');
		$table->string('jenis_kelamin');
		$table->string('alamat');
		$table->string('asal');
		$table->string('tujuan');
		$table->string('kepentingan');
		$table->string('keluhan');
		$table->string('image');
		$table->string('keterangan_sehat');

		$table->timestamps();
		
		$table->primary(array('nama'));
	});
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
