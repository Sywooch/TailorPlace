<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 08.11.2014
 * Time: 13:43
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
            echo Html::tag('i', '', ['class' => 'icon little-star']);
            echo Html::tag('span', 'Продавец');
            echo Html::tag('i', '', ['class' => 'icon little-star']);
        echo Html::endTag('div');

        echo RatingBlock::widget();

        $this->endBody();

        $this->startFooter();

        echo Html::beginTag('div', ['class' => 'icon-line']);
            echo Html::tag('i', '', ['class' => 'icon star']);
            echo Html::tag('span', 'Покупатель', ['class' => 'little-bigger']);
            echo Html::tag('span', '100%', ['class' => 'digit']);
        echo Html::endTag('div');

        $this->endFooter();
        $this->endPanel();
    }
} 