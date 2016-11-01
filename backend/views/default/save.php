<?php
/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * @var $this yii\web\View
 * @var $model bl\cms\payment\models\PaymentMethod
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Create Payment Method');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Methods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h5><?= Html::encode($this->title) ?></h5>
        <?= \bl\cms\shop\widgets\LanguageSwitcher::widget([
            'model' => $model
        ]);?>
    </div>

    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput() ?>
        <?= $form->field($model, 'description')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($attribute->isNewRecord ? Yii::t('shop', 'Create') : Yii::t('shop', 'Update'), ['class' => $attribute->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>