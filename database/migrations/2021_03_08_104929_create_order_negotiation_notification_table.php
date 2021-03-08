<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderNegotiationNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_negotiation_notification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_negotiation_id');
            $table->unsignedBigInteger('notification_id');

            $table->foreign('order_negotiation_id')
                ->references('id')
                ->on('order_negotiations')
                ->onDelete('cascade');

            $table->foreign('notification_id')
                ->references('id')
                ->on('notifications')
                ->onDelete('cascade');
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
        Schema::dropIfExists('order_negotiation_notification');
    }
}
