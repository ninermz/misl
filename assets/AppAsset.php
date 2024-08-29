<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/style2.css',
        'css/table.css',
        'css/create-update--form.css',
        'css/tuner.css',
        'css/metr.css'
    ];
    public $js = [
        'JS/script.js',
        'JS/icon.js',
        'JS/sorting.js',
        'JS/analytics.js',
        'JS/pitchdetect.js',
        'JS/metr.js'

    ];

    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap5\BootstrapAsset'

    ];
}
