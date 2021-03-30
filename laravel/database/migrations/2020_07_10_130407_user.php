<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{

    public function up()
    
    {
		Schema::create('user', function (Blueprint $table) {
		$table->id();
		$table->string('nama');
		$table->string('user');
		$table->string('password');
		$table->string('ttl');
		$table->string('jenis_kelamin');
		$table->string('alamat');
		$table->string('tujuan');
		$table->string('kepentingan');
		$table->string('keluhan');
		$table->string('photo');
		$table->string('keterangan_sehat');

		$table->timestamps();
	});
    }
    


    public function down()
    {
        //
    }
}
