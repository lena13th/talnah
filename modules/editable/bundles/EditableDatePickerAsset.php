<?php

namespace app\modules\editable\bundles;

use yii\web\AssetBundle;

/**
 * Class EditableDatePickerAsset
 *
 * @package app\modules\editable\bundles
 */
class EditableDatePickerAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@app/modules/editable/assets/datepicker';

    /**
     * @var array
     */
    public $css = [
        'vendor/css/datepicker3.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'vendor/js/bootstrap-datepicker.js',
        'bootstrap-editable-datepicker.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'app\modules\editable\bundles\EditableBootstrapAsset',
    ];
}
