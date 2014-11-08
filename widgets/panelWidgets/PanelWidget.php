<?php

namespace app\widgets\panelWidgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

abstract class PanelWidget extends Widget
{
    /**
     * @var null|string Размер панели
     */
    protected $size = null;

    /**
     * Запускает генерацию виджета
     * @return string
     */
    public function run(){}

    /**
     * Начало панели
     */
    protected function startPanel()
    {
        $class = 'panel';
        switch ($this->size) {
            case 'big':
                $class .= ' big-panel';
                break;
            case 'small':
                $class .= ' small-panel';
                break;
        }
        echo Html::beginTag('div', [
            'class' => $class,
            'id' => $this->shortClassName()
        ]);
    }

    /**
     * Конец панели
     */
    protected function endPanel()
    {
        echo Html::endTag('div');
    }

    /**
     * Начало шапки панели
     */
    protected function startHeader()
    {
        echo Html::beginTag('div', ['class' => 'panel-header']);
    }

    /**
     * Конец шапки панели
     */
    protected function endHeader()
    {
        echo Html::endTag('div');
    }

    /**
     * Начало тела панели
     */
    protected function startBody()
    {
        echo Html::beginTag('div', ['class' => 'panel-body']);
    }

    /**
     * Конец тела панели
     */
    protected function endBody()
    {
        echo Html::endTag('div');
    }

    /**
     * Начало подвала панели
     */
    protected function startFooter()
    {
        echo Html::beginTag('div', ['class' => 'panel-footer']);
    }

    /**
     * Конец подвала панели
     */
    protected function endFooter()
    {
        echo Html::endTag('div');
    }

    private function shortClassName()
    {
        $reflect = new \ReflectionClass($this);
        return $reflect->getShortName();
    }
}