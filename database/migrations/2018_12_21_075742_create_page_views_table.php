<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePageViewsTable.
 */
class CreatePageViewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_views', function(Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->nullable()->comment('微信用户openid');
            $table->string('identify')->nullable()->comment('页面标识');
            $table->string('duration')->nullable()->comment('页面停留时长');

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
		Schema::drop('page_views');
	}
}
