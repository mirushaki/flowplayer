<?php

namespace mirushaki\flowplayer;

use yii\web\AssetBundle;

/**
 * Asset bundle for flowplayer
 * @package mirushaki\flowplayer
 */
class FlowPlayerAsset extends AssetBundle
{
    /**
     * @var string the directory that contains the source asset files for this asset bundle.
     */
    public $sourcePath = '@vendor/mirushaki/flowplayer/assets';

    /**
     * @var string[] javascript files
     */
    public $js = [
      'js/flowplayer.min'
    ];


    /**
     * @var string[] css styles
     */
    public $css = [
        'css/flowplayer-skin.css'
    ];
}