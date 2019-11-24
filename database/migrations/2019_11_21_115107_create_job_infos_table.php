<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobInfosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('job_infos', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('job_title');
			$table->string('job_description');
			$table->string('salary');
			$table->string('location');
			$table->string('country');
			$table->bigInteger('employeer_id')->unsigned()->index();
			$table->foreign('employeer_id')->references('id')->on('employeers')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('job_infos');
	}
}
