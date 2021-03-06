<?php
/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * @var $paymentMethods \bl\cms\payment\common\entities\PaymentMethod[]
 * @var $order \bl\cms\cart\models\Order
 * @var $form \yii\bootstrap\ActiveForm
 */
use bl\multilang\entities\Language;
use yii\helpers\ArrayHelper;

\bl\cms\payment\widgets\assets\PaymentAsset::register($this);
$languagePrefix = (Language::getCurrent()->lang_id != Language::getDefault()->lang_id) ? '/' . Language::getCurrent()->lang_id : '';
?>

<div id="payment-selector" data-language-prefix="<?=$languagePrefix; ?>">
    <?= $form->field($order, 'payment_method_id')
        ->radioList(ArrayHelper::map($paymentMethods, 'id', function ($model) {
            return $model->translation->title;
        }))->label(false); ?>

    <div class="row">
        <div class="col-md-3">
            <img id="payment-image" src="" alt="">
        </div>
        <div class="col-md-9" id="payment-info">
            <div class="payment-title">
                <p id="payment-title"></p>
            </div>
            <div class="payment-description">
                <p id="payment-description"></p>
            </div>
        </div>
    </div>
</div>


