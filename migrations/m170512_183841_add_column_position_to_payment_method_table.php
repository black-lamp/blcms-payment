<?php

use yii\db\Migration;

class m170512_183841_add_column_position_to_payment_method_table extends Migration
{
    public function up()
    {
        $this->addColumn('payment_method', 'position', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('payment_method', 'position');
    }
}
