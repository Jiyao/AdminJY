<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->comment('父级ID');
            $table->string('name')->comment('名称');
            $table->string('slug', 50)->comment('缩写');
            $table->string('description')->nullable()->comment('描述');
            $table->integer('article_count')->comment('文章数');
            $table->tinyInteger('weight')->comment('权重');
            $table->tinyInteger('is_show')->default(0)->comment('是否展示');
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
        Schema::dropIfExists('categories');
    }
}
