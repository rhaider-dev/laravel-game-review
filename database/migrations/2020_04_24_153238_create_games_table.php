<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('title')->nullable();
			$table->integer('category_id')->nullable();
			$table->mediumText('short_description')->nullable();
			$table->mediumText('long_description')->nullable();
			$table->float('rating', 10, 0)->nullable();
			$table->text('affiliate_link')->nullable();
			$table->timestamps();
			$table->text('publisher')->nullable();
			$table->text('platform')->nullable();
			$table->text('release_date')->nullable();
			$table->text('image')->nullable();
			$table->integer('featured')->nullable();
			$table->text('status')->nullable();
			$table->text('slug')->nullable();
			$table->float('price', 10, 0)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('games');
	}
}
