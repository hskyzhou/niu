<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCardViewsTable.
 */
class CreateCardViewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('card_views', function(Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->nullable()->comment('微信用户openid');
            $table->string('identify')->nullable()->comment('卡片标识');
            $table->string('total')->nullable()->comment('卡片调用次数');
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
		Schema::drop('card_views');
	}
}
