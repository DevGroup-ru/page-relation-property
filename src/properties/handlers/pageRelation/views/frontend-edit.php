<?php

/**
 * @var $attribute_name string
 * @var $form \yii\widgets\ActiveForm
 * @var $label string
 * @var $model \app\properties\AbstractModel
 * @var $multiple boolean
 * @var $property_id integer
 * @var $property_key string
 * @var $this \yii\web\View
 * @var $values \app\properties\PropertyValue
 */

use app\modules\page\models\Page;
use yii\helpers\ArrayHelper;

$pagesIds = ArrayHelper::getColumn($values->values, 'value');
$data = ArrayHelper::map(Page::findAll($pagesIds), 'id', 'name');

?>

<?=\app\backend\widgets\Select2Ajax::widget(
    [
        'initialData' => $data,
        'form' => $form,
        'model' => $model,
        'modelAttribute' => $property_key,
        'multiple' => $multiple === 1,
        'searchUrl' => '/shop/backend-product/ajax-related-product',
        'additional' => [
            'placeholder' => Yii::t('app', 'Search'),
        ],
    ]
);
