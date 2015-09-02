<?php

namespace DotPlant\PageRelationProperty;

use app\components\ExtensionModule;

class Module extends ExtensionModule
{
    public static $moduleId = 'PageRelationProperty';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'configurableModule' => [
                'class' => 'app\modules\config\behaviors\ConfigurableModuleBehavior',
                'configurationView' => '@PageRelationProperty/views/configurable/_config',
                'configurableModel' => 'DotPlant\PageRelationProperty\components\ConfigurationModel',
            ]
        ];
    }
}
