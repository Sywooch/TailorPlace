<?php
/**
 * Виджет рейтинга студии
 */

namespace app\widgets\panelWidgets;

use yii\helpers\Html;
use app\widgets\RatingBlock;

class PersonalIndexStudioRating extends PanelWidget
{
    protected $size = 'small';

    public function run()
    {
        $this->startPanel();
        $this->startBody();

        echo Html::beginTag('div', ['class' => 'header icon-line']);
            echo Html::tag('i', '', ['class' => 'icon little-star-light']);
            echo Html::tag('span', 'Исполнитель');
            echo Html::tag('i', '', ['class' => 'icon little-star-light']);
        echo Html::endTag('div');

        echo RatingBlock::widget();

        $this->endBody();

        $this->startFooter();

        echo Html::beginTag('div', ['class' => 'icon-line']);
            echo Html::tag('i', '', ['class' => 'icon star']);
            echo Html::tag('span', 'Заказчик', ['class' => 'little-bigger']);
            echo Html::tag('span', ' 100%', ['class' => 'digit']);
        echo Html::endTag('div');

        $this->endFooter();
        $this->endPanel();
    }
} 