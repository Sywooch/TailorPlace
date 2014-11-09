<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 09.11.2014
 * Time: 13:55
 */

namespace app\widgets\panelWidgets;

use Yii;
use yii\helpers\Html;

class PersonalIndexUserOrders extends PanelWidget
{
    /**
     * @var array Активные заказы пользователя
     */
    protected $orders = [
        ['id' => 1025, 'type' => 'atelier', 'status' => 'Выполняется', 'price' => 125050],
        ['id' => 1025, 'type' => 'store', 'status' => 'Отправлен', 'price' => 400000],
    ];

    /**
     * @var int Общая сумма активных заказов
     */
    protected $total = 0;

    public function run()
    {
        $this->startPanel();
        $this->startBody();

        if (count($this->orders) > 0) {
            $this->createOrderList();
        } else {
            $this->createNoOrders();
        }

        $this->endBody();

        $this->startFooter();

        if ($this->total > 0) {
            $coinClass = 'icon rouble-gold';
        } else {
            $coinClass = 'icon rouble-light';
        }
        echo Html::beginTag('div', ['class' => 'icon-line']);
            echo Html::tag('span', 'Общая сумма заказов: ');
            echo Html::tag('i', '', ['class' => $coinClass]);
        // TODO при подсчете общей суммы необходимо учесть, что валюты могут быть разными
            echo Html::tag('span', Yii::$app->numberHelper->price($this->total), ['class' => 'digit']);
            echo Html::tag('span', ' руб.');
        echo Html::endTag('div');

        $this->endFooter();
        $this->endPanel();
    }

    protected function createOrderList()
    {
        echo Html::beginTag('ul');
        foreach ($this->orders as $order) {
            $this->createLine($order);
            $this->total += $order['price'];
        }
        echo Html::endTag('ul');
    }

    protected function createLine(array $order)
    {
        $typeClass = 'icon-circle small';
        if ($order['type'] == 'atelier') {
            $typeClass .= ' atelier';
        } else {
            $typeClass .= ' store';
        }
        echo Html::beginTag('li');
            echo Html::beginTag('div', ['class' => $typeClass]);
                 echo Html::tag('i', '');
            echo Html::endTag('div');
            echo Html::beginTag('div');
                echo Html::a('Заказ №' . $order['id'], []);
            echo Html::endTag('div');
            echo Html::tag('div', $order['status'], ['class' => 'italic']);
        // TODO обязательно в таблицу заказов добавить колонку валюты, т.к. до завершения заказа студия может поменять валюту
        // и у пользователя отобразится заказ в новой валюте
            echo Html::beginTag('div');
                echo Html::tag('span', Yii::$app->numberHelper->price($order['price']), ['class' => 'digit darker']);
                echo Html::tag('span', ' руб.', ['class' => 'smaller']);
            echo Html::endTag('div');
        echo Html::endTag('li');
    }

    protected function createNoOrders()
    {
        echo Html::tag('p', 'У Вас нет активных заказов');
    }
} 