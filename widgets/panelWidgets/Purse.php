<?php
/**
 * Виджет, отображающий баланс кошелька пользователя
 */

namespace app\widgets\panelWidgets;

use yii\helpers\Html;

class Purse extends PanelWidget
{
    /**
     * @var bool Отобразить ли ссылку на пополнение кошелька
     */
    private $showFillLine = true;
    protected $size = 'small';

    public function run()
    {
        $this->startPanel();
        $this->startBody();

        echo Html::beginTag('div', ['class' => 'header icon-line']);
            echo Html::tag('i', '', ['class' => 'icon rouble-light']);
            echo Html::tag('span', 'Баланс');
        echo Html::endTag('div');
        echo Html::tag('div', '0', ['class' => 'big-digit']);

        $this->endBody();

        $this->startFooter();

        echo Html::beginTag('div', ['class' => 'header icon-line']);
            echo Html::a('История платежей', ['href' => '']);
        echo Html::endTag('div');
        if ($this->showFillLine) {
            echo Html::beginTag('div', ['class' => 'header icon-line']);
                echo Html::a('Пополнить баланс', ['href' => '']);
            echo Html::endTag('div');
        }


        $this->endFooter();
        $this->endPanel();
    }
} 