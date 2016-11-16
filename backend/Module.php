<?php
namespace bl\cms\payment\backend;
use Yii;

/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'bl\cms\payment\backend\controllers';

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['payment'] =
            Yii::$app->i18n->translations['shop'] =
        [
            'class'          => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath'       => '@vendor/black-lamp/blcms-payment/backend/messages',
        ];
    }

}