<?php
/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * @var $paymentMethods \bl\cms\payment\common\entities\PaymentMethod[]
 * @var $order \bl\cms\cart\models\Order
 * @var $form \yii\bootstrap\ActiveForm
 */
use yii\helpers\ArrayHelper;

?>

<?= $form->field($order, 'payment_method_id')->textInput(); ?>
<?= $form->field($order, 'payment_method_id')->radioList(ArrayHelper::map($paymentMethods, 'id', function($model) {
    return $model->translation->title;
})); ?>
