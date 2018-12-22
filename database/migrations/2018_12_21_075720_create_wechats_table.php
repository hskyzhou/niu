<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateWechatsTable.
 */
class CreateWechatsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wechats', function(Blueprint $table) {
            $table->increments('id');

            $table->string('avatar')->nullable()->comment('头像');
            $table->string('openid')->nullable()->comment('微信用户openid');
            $table->string('name')->nullable()->comment('微信名');

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
		Schema::drop('wechats');
	}
}
