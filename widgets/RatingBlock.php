<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 08.11.2014
 * Time: 14:03
 */

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class RatingBlock extends Widget
{
    private $color = '#BBDC78';
    private $lineColor = '#9FD245';
    private $width = '95%';

    public function run()
    {
        echo Html::beginTag('div', ['class' => 'rating-block']);
            echo Html::beginTag('div');
                echo Html::tag('span', '95', [
                    'class' => 'big-digit',
                    'style' => 'color:' . $this->color
                ]);
                echo Html::tag('span', '%');
            echo Html::endTag('div');
            echo Html::beginTag('div', [
                'class' => 'line',
                'style' => 'border-color:' . $this->color
            ]);
                echo Html::tag('div', '', [
                    'style' => 'background-color:' . $this->lineColor . '; width:' . $this->width
                ]);
            echo Html::endTag('div');
        echo Html::endTag('div');
    }
} 