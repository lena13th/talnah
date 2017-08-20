<?php

namespace app\modules\editable\bundles;

use yii\web\AssetBundle;

/**
 * Class EditableDateTimePickerAsset
 *
 * @package app\modules\editable\bundles
 */
class EditableDateTimePickerAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@app/modules/editable/assets/datetimepicker';

    /**
     * @var array
     */
    public $depends = [
        'app\modules\editable\bundles\EditableBootstrapAsset',
    ];

    /**
     * Init object
     */
    public function init()
    {
        $this->css[] = 'vendor/css/bootstrap-datetimepicker.min.css';
        $this->js[] = 'vendor/js/bootstrap-datetimepicker.min.js';
        $this->js[] = 'bootstrap-editable-datetimepicker.js';
        parent::init();
    }
}
