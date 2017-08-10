<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class NewsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'owlcarousel/assets/owl.carousel.min.css',
        'owlcarousel/assets/owl.theme.default.min.css',

    ];
    public $js = [
        'owlcarousel/jquery.min.js',
        'owlcarousel/owl.carousel.js',
        'owlcarousel/owlscript.js'
//        'js/catmenu.js',
        // 'js/subproduct.js',
//        'js/down.js',
        // 'js/owl.carousel.min.js',
//        'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}
