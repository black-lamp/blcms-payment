<?php
/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * @var $this yii\web\View
 * @var $selectedLanguage \bl\multilang\entities\Language
 * @var $model bl\cms\payment\common\entities\PaymentMethod
 * @var $modelTranslation bl\cms\payment\common\entities\PaymentMethodTranslation
 */

use bl\imagable\helpers\FileHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

if ($model->isNewRecord) {
    $this->title = Yii::t('payment', 'Adding new payment method');
}
else  {
    if ($modelTranslation->isNewRecord) {
        $this->title = Yii::t('payment', 'Adding new payment method translation');
    }
    else {
        $this->title = Yii::t('payment', 'Editing payment method translation');
    }
}$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payment Methods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h5><?= Html::encode($this->title) ?></h5>
        <?= \bl\cms\shop\widgets\LanguageSwitcher::widget([
            'selectedLanguage' => $selectedLanguage,
        ]);?>
    </div>

    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($modelTranslation, 'title')->textInput() ?>
        <?= $form->field($modelTranslation, 'description')->textInput() ?>

        <?= $form->field($model, 'discount')->textInput(['type' => 'number']) ?>

        <?= $form->field($model, 'discount_counter')->textInput() ?>
        <?= $form->field($model, 'discount_widget')->textInput() ?>

        <!--LOGO-->
        <div class="pull-right">
            <div>
                <?php if (!empty($model->image)) : ?>
                    <?= Html::img(
                        '/images/payment/' . FileHelper::getFullName(\Yii::$app->shop_imagable->get('payment', 'small', $model->image)),
                        ['class' => '']); ?>
                <?php endif ;?>
            </div>

            <!--DELETE LOGO BUTTON-->
            <?php if (!empty($model->image)) : ?>
                <?= Html::a(Yii::t('payment', 'Delete logo'),
                    Url::to(['delete-image', 'id' => $model->id]),
                    ['class' => 'btn btn-xs btn-danger center-block']); ?>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('payment', 'Save'), ['class' => 'btn btn-xs btn-primary']) ?>
            <?= Html::a(Yii::t('payment', 'Close'), Url::to(['index']), ['class' => 'btn btn-xs btn-danger']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>