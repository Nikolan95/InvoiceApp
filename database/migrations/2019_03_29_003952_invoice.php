<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {        
           $table->bigIncrements('id');
           $table->bigInteger('client_id')->unsigned();
           $table->string('name')->unique();
           $table->date('date');
           $table->date('paid_at')->nullable();
           $table->string('diff')->nullable();
           $table->integer('avans')->nullable();
           $table->timestamps();

           $table->foreign('client_id')
            ->references('id')->on('clients')
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
        Schema::dropIfExists('invoices');    
    }
}    
