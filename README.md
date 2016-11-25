# blcms-payment
Module for Blcms-shop

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```
php composer.phar require --prefer-dist black-lamp/blcms-payment "*"
```
or add to the require section of your `composer.json` file:
```
"black-lamp/blcms-payment": "*"
```

**Migrations**
php yii migrate --migrationPath=@vendor/black-lamp/blcms-payment/migrations


**Configuration**
__Common config file:__
```
'components' => [
    'shop_imagable' => [
        'class' => 'bl\imagable\Imagable',
        'imageClass' => \backend\components\imagable\CreateImageImagine::className(),
        'nameClass' => 'backend\components\imagable\CRC32Name',
        'imagesPath' => '@frontend/web/images',
        'categories' => [
            'origin' => false,
            'category' => [
                'payment' => [
                    'origin' => false,
                    'size' => [
                        'big' => [
                            'width' => 1500,
                            'height' => 500
                        ],
                        'thumb' => [
                            'width' => 500,
                            'height' => 500,
                        ],
                        'small' => [
                            'width' => 150,
                            'height' => 150
                        ]
                    ]
                ],
            ],
        ],
    ],
],
```

**Roles and its permissions:**

_paymentManager_
- viewPaymentMethodList
- savePaymentMethod
- deletePaymentMethod

