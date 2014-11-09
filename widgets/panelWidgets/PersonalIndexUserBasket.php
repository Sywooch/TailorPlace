<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 09.11.2014
 * Time: 16:19
 */

namespace app\widgets\panelWidgets;

use Yii;
use yii\helpers\Html;

class PersonalIndexUserBasket extends PersonalIndexUserOrders
{
    protected function createLine(array $good)
    {
        echo Html::beginTag('li');
            echo Html::beginTag('div');
                echo Html::a('Шляпа из синамей “Вольный ветер” dfsdf sdfs df sdfsdf sdfsdf', []);
            echo Html::endTag('div');
            echo Html::beginTag('div');
                echo Html::tag('span', Yii::$app->numberHelper->price($good['price']), ['class' => 'digit darker']);
                echo Html::tag('span', ' руб.', ['class' => 'smaller']);
            echo Html::endTag('div');
        echo Html::endTag('li');
    }

    protected function createNoOrders()
    {
        echo Html::tag('p', 'У Вас нет товаров в корзине');
    }
} 