<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code', 3);
            $table->double('rate', 9, 6, true);
            $table->double('surcharge_percentage', 4, 2, true);
            $table->double('surcharge_amount', 9, 2, true);
            $table->double('discount_percentage', 4, 2, true)->default(0);
            $table->double('discount_amount', 9, 2, true)->default(0);
            $table->double('amount_purchased', 9, 2, true);
            $table->double('amount_paid', 9, 2, true);
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
