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

use app\models\Property;
use app\modules\page\models\Page;
use yii\helpers\ArrayHelper;
use kartik\helpers\Html;

$pagesIds = ArrayHelper::getColumn($values->values, 'value');
/** @var Page[] $pages */
$pages = [];
foreach ($pagesIds as $id) {
    $_page = Page::findById($id);
    if ($_page !== null) {
        $pages[] = $_page;
    }
}

?>

<dl>
    <?php
    if (count($productIds) == 0) {
        return;
    }
    $property = Property::findById($property_id);
    echo Html::tag('dt', $property->name);
    foreach ($pages as $page) {
        echo Html::tag('dd', $page->name);
    }
    ?>
</dl>
