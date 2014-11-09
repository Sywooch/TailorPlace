<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 08.11.2014
 * Time: 12:19
 */

namespace app\widgets\panelWidgets;

use Yii;
use yii\helpers\Html;

class PersonalIndexStudioOrders extends PanelWidget
{
    protected $size = 'small';

    public function run()
    {
        $this->startPanel();
        $this->startBody();

        echo Html::beginTag('div', ['class' => 'header icon-line']);
            echo Html::tag('i', '', ['class' => 'icon order-light']);
            echo Html::tag('span', 'Активные');
        echo Html::endTag('div');
        echo Html::tag('div', '0', ['class' => 'big-digit']);

        $this->endBody();

        $this->startFooter();

        echo Html::tag('div', 'Общая сумма');
        echo Html::beginTag('div', ['class' => 'icon-line']);
            echo Html::tag('i', '', ['class' => 'icon rouble-light']);
            echo Html::tag('span', Yii::$app->numberHelper->price(0), ['class' => 'digit']);
            echo Html::tag('span', ' руб.', ['class' => 'smaller']);
        echo Html::endTag('div');

        $this->endFooter();
        $this->endPanel();
    }
} 