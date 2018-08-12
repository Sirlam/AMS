<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->decimal('starting_balance', 16, 2);
            $table->decimal('current_balance', 16, 2);
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
        Schema::dropIfExists('accounts');
    }
}
