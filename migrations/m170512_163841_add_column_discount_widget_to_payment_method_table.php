<?php

use yii\db\Migration;

class m170512_163841_add_column_discount_widget_to_payment_method_table extends Migration
{
    public function up()
    {
        $this->addColumn('payment_method', 'discount_widget', $this->string());
    }

    public function down()
    {
        $this->dropColumn('payment_method', 'discount_widget');
    }
}
