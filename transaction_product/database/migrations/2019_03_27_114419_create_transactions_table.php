<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stock_id');
            $table->string('transaction');
            $table->integer('quantity');
            $table->float('price');
            $table->date('date');
            $table->float('transaction_status')->nullable();
            $table->string('total_porfitloss')->nullable();
            $table->timestamps();

            $table->foreign('stock_id')
                ->references('id')->on('stocks')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
