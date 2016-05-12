<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('pc_serial', 30);
            $table->string('customer_description', 200);
            $table->string('employee_accept_order', 50); // служител приел поръчката 
            $table->dateTime('finish_order_date')->nullable(); //
            $table->string('ascertained_issues', 200); // котстатиран проблем
            $table->string('decision', 200); // решение 
            $table->string('description_iteme', 200); // описание на нещата
            $table->mediumText('note', 200); //
            $table->string('released_employee', 50); //
            $table->tinyInteger('status')->default(0); //// Статус на поръчката
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
