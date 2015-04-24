<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function(Blueprint $table)
		{
			$table->Increments('id');
			$table->Integer('course_id')->unsigned()->index();
			$table->text('review');
			$table->text('recommend');
			

			$table->timestamps();

			$table->foreign('course_id')
				  ->references('id')
				  ->on('courses');  
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reviews');
	}

}
