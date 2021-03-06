<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('auth_id');

            $table->foreign('auth_id')
                ->references('id')
                ->on('users')
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
        Schema::table('order_requests', function (Blueprint $table) {
            $table->dropForeign(['auth_id']);
            $table->dropColumn('auth_id');
        });
    }
}
