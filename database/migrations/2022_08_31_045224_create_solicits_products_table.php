<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_solicit', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('solicit_id');
            $table->unsignedBigInteger('unit_id');
            $table->integer('quantidade');
            $table->timestamps();

            $table->foreign('product_id')
                    ->references('id')
                    ->on('products');

            $table->foreign('solicit_id')
                    ->references('id')
                    ->on('solicits');

            $table->foreign('unit_id')
                    ->references('id')
                    ->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_solicit');
    }
}
