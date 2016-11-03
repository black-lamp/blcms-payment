<?php
/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * This widget adds payment select.
 *
 * Example:
 * <?= PaymentSelector::widget([
 * ]); ?>
 *
 */

namespace bl\cms\payment\widgets;


use bl\cms\cart\models\Order;
use bl\cms\payment\common\entities\PaymentMethod;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Widget;

class PaymentSelector extends Widget
{

    /**
     * @var ActiveForm
     */
    public $form;

    /**
     * @var Order
     */
    public $order;

    public function run()
    {
        $paymentMethods = PaymentMethod::find()->all();

        return $this->render('payment-selector', [
            'order' => $this->order,
            'form' => $this->form,
            'paymentMethods' => $paymentMethods,
        ]);
    }

}