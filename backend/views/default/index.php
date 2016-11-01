<?php

use bl\multilang\entities\Language;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $paymentMethods bl\cms\payment\models\PaymentMethod */

$this->title = Yii::t('payment', 'Payment Methods');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h5>
            <i class="glyphicon glyphicon-list">
            </i>
            <?= $this->title; ?>
        </h5>
        <p>
            <?= Html::a(Yii::t('payment', 'Add payment method'), Url::toRoute(['save', 'languageId' => Language::getCurrent()->id]), ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="panel-body">
        <table class="table table-hover table-striped table-bordered">
            <tr>
                <th class="col-md-1">
                    <?= Yii::t('payment', 'id'); ?>
                </th>
                <th class="">
                    <?= Yii::t('payment', 'Title'); ?>
                </th>
            </tr>
            <?php foreach ($paymentMethods as $paymentMethod) : ?>
                <tr>
                    <td>
                        <?= $paymentMethod->payment_method_id; ?>
                    </td>
                    <td>
                        <?= $paymentMethod->title; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>