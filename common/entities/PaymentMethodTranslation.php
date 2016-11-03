<?php
/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 */

namespace bl\cms\payment\common\entities;
use bl\multilang\entities\Language;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "payment_method_translation".
 *
 * @property integer $id
 * @property integer $payment_method_id
 * @property integer $language_id
 * @property string $title
 * @property string $description
 * @property string $image
 *
 * @property Language $language
 * @property PaymentMethod $paymentMethod
 */
class PaymentMethodTranslation extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_method_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_method_id', 'language_id'], 'integer'],
            [['description'], 'string'],
            [['title', 'image'], 'string', 'max' => 255],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['payment_method_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentMethod::className(), 'targetAttribute' => ['payment_method_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('payment', 'ID'),
            'payment_method_id' => Yii::t('payment', 'Payment Method ID'),
            'language_id' => Yii::t('payment', 'Language ID'),
            'title' => Yii::t('payment', 'Title'),
            'description' => Yii::t('payment', 'Description'),
            'image' => Yii::t('payment', 'Image'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethod()
    {
        return $this->hasOne(PaymentMethod::className(), ['id' => 'payment_method_id']);
    }
}