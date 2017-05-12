<?php

use yii\db\Migration;

class m170511_153841_add_column_discount_to_payment_method_table extends Migration
{
    public function up()
    {
        $this->addColumn('payment_method', 'discount', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('payment_method', 'discount');
    }
}
