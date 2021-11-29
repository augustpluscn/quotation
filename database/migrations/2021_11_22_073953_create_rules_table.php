<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->string('编号')->comment('编号');
            $table->string('分类')->comment('分类')->nullable();
            $table->string('成本名称')->comment('成本名称')->nullable();
            $table->string('公式')->comment('公式')->nullable();
            $table->string('说明')->comment('说明')->nullable();
            $table->string('备注')->comment('备注')->nullable();
            $table->integer('级别')->comment('级别')->nullable();
            $table->string('元素')->comment('元素')->nullable();
            $table->timestamps();
            $table->primary('编号');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
}
