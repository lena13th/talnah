<?php

namespace app\modules\editable\bundles;

use yii\web\AssetBundle;

/**
 * Class EditableAddressAsset
 *
 * @package app\modules\editable\bundles
 */
class EditableAddressAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@app/modules/editable/assets/address';

    /**
     * @var array
     */
    public $css = [
        'bootstrap-editable-address.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'bootstrap-editable-address.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'app\modules\editable\bundles\EditableBootstrapAsset',
    ];
}
