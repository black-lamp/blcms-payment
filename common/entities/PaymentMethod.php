<?php
namespace bl\cms\payment\common\entities;

use bl\imagable\helpers\base\BaseFileHelper;
use bl\multilang\behaviors\TranslationBehavior;
use Exception;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "payment_method".
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * @property integer $id
 * @property integer $image
 *
 * @property PaymentMethodTranslation[] $paymentMethodTranslations
 */
class PaymentMethod extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'translation' => [
                'class' => TranslationBehavior::className(),
                'translationClass' => PaymentMethodTranslation::className(),
                'relationColumn' => 'payment_method_id'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_method';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'string'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethodTranslations()
    {
        return $this->hasMany(PaymentMethodTranslation::className(), ['payment_method_id' => 'id']);
    }
}