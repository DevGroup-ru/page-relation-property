<?php

use app\models\PropertyHandler;
use DotPlant\PageRelationProperty\properties\handlers\pageRelation\PageRelationProperty;
use yii\db\Migration;

class m150902_131101_initial extends Migration
{

    public function up()
    {
        $this->insert(
            PropertyHandler::tableName(),
            [
                'name' => 'Page relation',
                'frontend_render_view' => 'frontend-render',
                'frontend_edit_view' => 'frontend-edit',
                'backend_render_view' => 'backend-render',
                'backend_edit_view' => 'backend-edit',
                'handler_class_name' => PageRelationProperty::class,
            ]
        );
        $this->insert(
            '{{%configurable}}',
            [
                'module' => 'PageRelationProperty',
                'sort_order' => 99,
                'section_name' => 'PageRelationProperty',
                'display_in_config' => 0,
            ]
        );
    }

    public function down()
    {
        $this->delete(
            PropertyHandler::tableName(),
            [
                'handler_class_name' => PageRelationProperty::class,
            ]
        );
        $this->delete('{{%configurable}}', ['module' => 'PageRelationProperty']);
    }

}
