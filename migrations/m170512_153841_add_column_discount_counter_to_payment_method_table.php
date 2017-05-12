<?php

use yii\db\Migration;

class m170512_153841_add_column_discount_counter_to_payment_method_table extends Migration
{
    public function up()
    {
        $this->addColumn('payment_method', 'discount_counter', $this->string());
    }

    public function down()
    {
        $this->dropColumn('payment_method', 'discount_counter');
    }
}
