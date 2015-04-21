<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->string('courseTitle');
			$table->string('courseProvider');
			$table->string('courseVenue');
			$table->string('courseTelephone');
			$table->string('courseEmail');
			$table->string('courseContact');
			$table->string('courseNumber');
			$table->datetime('startDate')->index();
			$table->datetime('endDate');
			$table->string('duration');
			$table->text('details');
			$table->string('courseObjectives');
			$table->string('courseFees');
			$table->string('travelFees');
			$table->text('deadline');
			$table->string('lineManager')->index();
			$table->text('standards');
			$table->string('approved')->index();
			$table->string('lineManagerApproved')->index();
			$table->text('lineManagerComments');
			$table->text('courseAdminComments');
			$table->integer('recommended')->unsigned;
			$table->timestamps();

			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}


