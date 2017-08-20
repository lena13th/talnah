<?php

namespace app\modules\comments\traits;

use Yii;
use app\modules\comments\Module;

/**
 * Class ModuleTrait
 *
 * @package app\modules\comments\traits
 */
trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return Yii::$app->getModule('comment');
    }
}
