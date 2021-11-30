<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_details', function (Blueprint $table) {
            $table->string('报价单号')->comment('报价单号');
            $table->string('序号')->comment('序号');
            $table->string('元素编号');
            $table->string('元素名称')->nullable();
            $table->string('值');

            $table->timestamps();
            $table->primary(['报价单号', '序号']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_details');
    }
}
