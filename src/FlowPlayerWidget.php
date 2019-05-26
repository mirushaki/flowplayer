<?php

namespace mirushaki\flowplayer;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * FlowPlayer widget for yii2
 *
 * @author Mirian Jintchvelashvili <mirian.jinchvelashvili@gmail.com>
 * @see https://flowplayer.com/
 */
class FlowPlayerWidget extends Widget {

    /**
     * @var string the widget container element
     * Defaults to div
     */
    public $container;

    /**
     * @var array the HTML attributes for the widget container
     * Defaults to an auto generated id and class => "flowplayer fp-default-playlist"
     */
    public $containerOptions = [];

    /**
     * @var array options for the Owl Carousel plugin
     */
    public $pluginOptions = [];

    /**
     * Initializes the widget.
     *
     */
    public function init()
    {
        parent::init();
        if (!isset($this->container)) {
            $this->container = 'div';
        }
        if (!is_array($this->containerOptions)) {
            $this->containerOptions = [];
        }
        if (!is_array($this->pluginOptions)) {
            $this->pluginOptions = [];
        }
        $this->initOptions();
        ob_start();
    }

    /**
     * Intialises the plugin options
     */
    protected function initOptions()
    {
        $this->containerOptions = array_merge([
            'id' => $this->getId()
        ], $this->containerOptions);
        Html::addCssClass($this->containerOptions, 'flow-player');
    }

    /**
     * Registers the needed assets.
     *
     * @param View $view The View object
     */
    public function registerAssets($view)
    {
        FlowPlayerAsset::register($view);
        $js = 'flowplayer("#' . $this->containerOptions['id'] . '", ';
        $js .= json_encode($this->pluginOptions) . "\n";
        $js .= ");";
        $view->registerJs($js, $view::POS_READY);
    }

    /**
     * Executes the widget.
     * @return string the result of widget execution to be outputted.
     */
    public function run()
    {
        $content = ob_get_clean();
        $view = $this->getView();
        $this->registerAssets($view);
        return Html::tag($this->container, $content, $this->containerOptions);
    }
}
