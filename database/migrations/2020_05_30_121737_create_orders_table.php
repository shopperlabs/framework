<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Shopper\Framework\Traits\Database\MigrationTrait;

class CreateOrdersTable extends Migration
{
    use MigrationTrait;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTableName('orders'), function (Blueprint $table) {
            $this->addCommonFields($table);

            $table->string('amount', 32)->nullable();
            $table->string('status', 32); // defaults: ['in-progress', 'treatment', 'in-delivery', 'delivered', 'canceled']
            $table->string('currency');
            $table->decimal('shipping_total', 10, 2);
            $table->string('shipping_method')->nullable();
            $table->text('notes')->nullable();

            $table->string('stripe_transaction_id')->nullable();
            $this->addForeignKey($table, 'parent_order_id', $this->getTableName('orders'));
            $this->addForeignKey($table, 'shipping_address_id', $this->getTableName('addresses'));
            $this->addForeignKey($table, 'user_id', 'users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->getTableName('orders'));
    }
}
