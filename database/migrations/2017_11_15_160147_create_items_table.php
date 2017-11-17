<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            //need to add image
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('actual_price');
            $table->float('sale_price');
            $table->dateTimeTz('offer_start_date');
            $table->dateTimeTz('offer_end_date');
            $table->integer('quantity')->nullable();
            $table->string('offer_description')->nullable();
            $table->integer('seller_id')->unsigned()->nullable();
            $table->string('brand_name');
            $table->string('product_origin_page')->nullable();
            $table->string('catagory');
            $table->string('sub_catagory_1');
            $table->string('sub_catagory_2');
            $table->string('sub_catagory_3');
            $table->text('keywords');
            $table->boolean('is_featured');
            $table->timestamps();
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
