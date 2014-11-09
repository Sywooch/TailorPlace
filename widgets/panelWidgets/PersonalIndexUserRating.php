<?php
/**
 * Виджет рейтинга пользователя
 */

namespace app\widgets\panelWidgets;

use yii\helpers\Html;
use app\widgets\RatingBlock;

class PersonalIndexUserRating extends PanelWidget
{
    protected $size = 'small';

    public function run()
    {
        $this->startPanel();
        $this->startBody();

        echo Html::beginTag('div', ['class' => 'header icon-line']);
            echo Html::tag('i', '', ['class' => 'icon little-star']);
            echo Html::tag('span', 'Заказчик');
            echo Html::tag('i', '', ['class' => 'icon little-star']);
        echo Html::endTag('div');

        echo RatingBlock::widget();

        $this->endBody();

        $this->startFooter();

        echo Html::beginTag('div', ['class' => 'icon-line']);
            echo Html::a('История заказов', []);
        echo Html::endTag('div');

        $this->endFooter();
        $this->endPanel();
    }
} 