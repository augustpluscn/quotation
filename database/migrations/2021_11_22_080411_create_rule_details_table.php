<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_details', function (Blueprint $table) {
            $table->string('规则编号')->comment('规则编号');
            $table->string('序号')->comment('序号');
            $table->string('计算元素')->comment('计算元素')->nullable();
            $table->string('来源类型')->comment('来源类型')->nullable();
            $table->string('来源')->comment('来源')->nullable();
            $table->string('来源说明')->comment('来源说明')->nullable();
            $table->timestamps();
            $table->primary(['规则编号', '序号']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rule_details');
    }
}
