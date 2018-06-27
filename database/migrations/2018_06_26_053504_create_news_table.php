<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');

            $table->string('zh_title')->nullable()->default('')->comment('中文标题');
            $table->string('en_title')->nullable()->default('')->comment('英文标题');
            $table->string('jp_title')->nullable()->default('')->comment('日文标题');
            $table->text('zh_content')->nullable()->comment('中文内容');
            $table->text('zh_content_html')->nullable()->comment('中文内容');
            $table->text('en_content')->nullable()->comment('英文内容');
            $table->text('en_content_html')->nullable()->comment('英文内容');
            $table->text('jp_content')->nullable()->comment('日文内容');
            $table->text('jp_content_html')->nullable()->comment('日文内容');
            $table->tinyInteger('is_index')->nullable()->default(2)->comment('1-首页显示，2-首页不显示');
            $table->tinyInteger('category')->nullable()->comment('1-新闻,2-快讯,3-专访');
            $table->string('publish_at')->nullable()->comment('发布时间');
            $table->string('thumb')->nullable()->comment('缩略图');
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
        Schema::dropIfExists('news');
    }
}
