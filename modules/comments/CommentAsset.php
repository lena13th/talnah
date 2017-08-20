<?php

namespace app\modules\comments;

use yii\web\AssetBundle;

/**
 * Class CommentAsset
 *
 * @package app\modules\comments
 */
class CommentAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@app/modules/comments/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/comment.js',
    ];

    /**
     * @inheritdoc
     */
    public $css = [
        'css/comment.css',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
    ];
}
