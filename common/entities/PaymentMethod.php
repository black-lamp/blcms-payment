<?php
namespace bl\cms\payment\common\entities;

use bl\imagable\helpers\FileHelper;
use bl\multilang\behaviors\TranslationBehavior;
use ReflectionMethod;
use Yii;
use yii\base\Widget;
use yii\db\ActiveRecord;
use yii2tech\ar\position\PositionBehavior;

/**
 * This is the model class for table "payment_method".
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * @property integer $id
 * @property integer $image
 * @property integer $discount
 * @property string $discount_counter
 * @property string $discount_widget
 *
 * @property PaymentMethodTranslation[] $paymentMethodTranslations
 */
class PaymentMethod extends ActiveRecord
{

    /**
     * @var string
     */
    private $imagePath = '/images/payment/';

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
            'positionBehavior' => [
                'class' => PositionBehavior::className(),
                'positionAttribute' => 'position',
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
            [['discount'], 'integer'],
            [['discount_counter', 'discount_widget'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image' => Yii::t('payment', 'Logo'),
            'discount' => Yii::t('payment', 'Discount'),
            'discount_counter' => Yii::t('payment', 'Discount counter'),
            'discount_widget' => Yii::t('payment', 'Discount widget')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        return $this->hasMany(PaymentMethodTranslation::className(), ['payment_method_id' => 'id']);
    }

    public function getBigLogo() {
        $logo = $this->getLogo('big');
        return $logo;
    }

    public function getThumbLogo() {
        $logo = $this->getLogo('thumb');
        return $logo;
    }

    public function getSmallLogo() {
        $logo = $this->getLogo('small');
        return $logo;
    }

    private function getLogo($size) {
        if (!empty($this->image)) {
            return $this->imagePath . FileHelper::getFullName(
                \Yii::$app->shop_imagable->get('payment', $size, $this->image));
        }
        else return '';
    }

    public function widget($form) {
        if(!empty($this->discount_widget)) {
            $widgetClass = new \ReflectionClass($this->discount_widget);
            if($widgetClass->isSubclassOf(Widget::className())) {
                $widgetMethod = new ReflectionMethod($this->discount_widget, 'widget');
                $widgetResult = $widgetMethod->invoke(null, ['form' => $form, 'paymentMethod' => $this]);

                if(!empty($widgetResult)) {
                    return $widgetResult;
                }
            }
        }

        return "";
    }
}