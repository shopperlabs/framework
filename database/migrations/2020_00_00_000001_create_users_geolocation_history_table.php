<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Shopper\Framework\Traits\Database\MigrationTrait;

class CreateUsersGeolocationHistoryTable extends Migration
{
    use MigrationTrait;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Users & Customers table
         */
        Schema::create($this->getTableName('users_geolocation_history'), function (Blueprint $table) {
            $this->addCommonFields($table, true);

            $table->json('ip-api')->nullable();
            $table->json('extreme-ip-lookup')->nullable();

            $this->addForeignKey($table, 'user_id', $this->getTableName('users'), false);
            $this->addForeignKey($table, 'order_id', $this->getTableName('orders'), true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->getTableName('users_geolocation_history'));
    }
}
