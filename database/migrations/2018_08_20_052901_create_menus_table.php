<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMenusTable.
 */
class CreateMenusTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable()->comment('菜单名称');
            $table->string('en_name')->nullable()->comment('菜单英文名称');
            $table->string('route')->nullable()->comment('菜单路由');
            $table->string('icon')->nullable()->comment('菜单图标');
            $table->string('permission')->nullable()->comment('权限');
            $table->string('description')->nullable()->comment('备注');
            $table->integer('sort')->nullable()->default(1)->comment('排序');
            $table->string('route_prefix')->nullable()->comment('路由前缀，高亮显示菜单');
            $table->timestamps();

            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menus');
	}
}
