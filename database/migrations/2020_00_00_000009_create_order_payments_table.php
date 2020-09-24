<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Shopper\Framework\Traits\Database\MigrationTrait;

class CreateOrderItemsTable extends Migration
{
    use MigrationTrait;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTableName('order_payments'), function (Blueprint $table) {
            $this->addCommonFields($table);

            $table->decimal('total_amount', 10, 2);
            $table->string('currency');
            $table->enum('status', ['pending', 'treatment', 'partial-paid', 'paid', 'rejected'])->default('pending');
            $table->string('platform');
            $table->json('details');

            $this->addForeignKey($table, 'order_id', $this->getTableName('orders'));
        });

        Schema::create($this->getTableName('order_refunds'), function (Blueprint $table) {
            $this->addCommonFields($table);

            $table->increments('id');
            $table->longText('refund_reason')->nullable();
            $table->string('refund_amount')->nullable();
            $table->enum('status', ['pending', 'treatment', 'partial-refund', 'total-refund', 'refused'])->default('pending');
            $table->longText('notes');
            
            $this->addForeignKey($table, 'order_id', $this->getTableName('orders'));
            $this->addForeignKey($table, 'user_id', $this->getTableName('users'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->getTableName('order_payments'));
        Schema::dropIfExists($this->getTableName('order_refunds'));
    }
}
