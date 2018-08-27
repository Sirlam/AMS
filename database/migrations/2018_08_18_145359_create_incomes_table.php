<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->decimal('amount', 16, 2);
            $table->unsignedInteger('on_account');
            $table->foreign('on_account')->references('id')->on('accounts')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('last_updated_by');
            $table->foreign('last_updated_by')->references('id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('incomes');
    }
}
