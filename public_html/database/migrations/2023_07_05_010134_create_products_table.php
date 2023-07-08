<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('provider');
            $table->string('item_code')->nullable();
            $table->text('description')->nullable();
            $table->string('family')->nullable();
            $table->string('material')->nullable();
            $table->string('capacity')->nullable();
            $table->string('color')->nullable();
            $table->string('stock')->default(0);
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('products')->onDelete('cascade');


            $table->timestamps();
            $table->softDeletes();
            $table->index('id');
            $table->index('parent_id');
            $table->index('deleted_at');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
