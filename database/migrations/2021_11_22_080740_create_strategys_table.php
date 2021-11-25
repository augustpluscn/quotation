<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrategysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategys', function (Blueprint $table) {
            $table->string('编号')->comment('编号');
            $table->string('名称')->comment('名称')->nullable();
            $table->string('描述')->comment('描述')->nullable();
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
        Schema::dropIfExists('strategys');
    }
}
