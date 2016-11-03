<?php

use bl\multilang\entities\Language;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model bl\cms\payment\common\entities\PaymentMethod */

$this->title = Yii::t('payment', 'Payment Methods');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <h5 class="col-md-6">
                <i class="glyphicon glyphicon-list">
                </i>
                <?= $this->title; ?>
            </h5>
            <p class="col-md-6">
                <?= Html::a(Yii::t('payment', 'Add payment method'),
                    Url::toRoute(['save', 'languageId' => Language::getCurrent()->id]),
                    ['class' => 'btn btn-xs btn-primary pull-right']) ?>
            </p>
        </div>
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
                <th class="col-md-2 text-center">
                    <?= Yii::t('payment', 'Manage'); ?>
                </th>
            </tr>
            <?php foreach ($model as $paymentMethod) : ?>
                <tr>
                    <td>
                        <?= $paymentMethod->id; ?>
                    </td>
                    <td>
                        <?= Html::a($paymentMethod->translation->title,
                            Url::to(['save', 'id' => $paymentMethod->id, 'languageId' => Language::getCurrent()->id])); ?>
                    </td>
                    <td>
                        <?= \bl\cms\shop\widgets\ManageButtons::widget(['model' => $paymentMethod]); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>