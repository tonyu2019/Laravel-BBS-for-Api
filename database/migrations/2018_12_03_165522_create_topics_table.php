<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index()->comment('标题');
            $table->text('body')->comment('内容');
            $table->integer('user_id')->comment('用户id')->unsigned();
            $table->integer('category_id')->comment('分类ID')->unsigned();
            $table->integer('reply_count')->comment('回复数量')->unsigned()->default(0);
            $table->integer('view_count')->comment('查看数量')->unsigned()->default(0);
            $table->integer('last_reply_user_id')->unsigned()->default(0)->comment('最后回复用户ID');
            $table->integer('order')->unsigned()->default(100)->comment('排序');
            $table->text('except')->nullable()->comment('摘要');
            $table->string('slug')->nullable()->comment('自定义url');
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
        Schema::dropIfExists('topics');
    }
}
