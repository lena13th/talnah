<?php

namespace app\modules\editable\bundles;

use yii\web\AssetBundle;

/**
 * Class EditableComboDateAsset
 *
 * @package app\modules\editable\bundles
 */
class EditableComboDateAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@app/modules/editable/assets/combodate';

    /**
     * @var array
     */
    public $js = [
        'vendor/moment-with-langs.min.js',
        'vendor/combodate.js',
        'bootstrap-editable-combodate.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'app\modules\editable\bundles\EditableBootstrapAsset',
    ];
}
