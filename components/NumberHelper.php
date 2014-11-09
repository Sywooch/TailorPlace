<?php
/**
 * Осуществляет операции с числами
 */

namespace app\components;


class NumberHelper
{
    /**
     * Форматирует число в валюту
     * @param int|float $number Валюта, умноженная на 100 (чтобы в базе хранилась в int)
     * @param bool $divide Если false, то не будет осуществлять деление, а отформатирует поданное число
     * @return string Отформатированное число для денежного номинала
     */
    public function price($number, $divide = true)
    {
        // TODO сделать форматирование для разных локалей
        if ($divide) {
            $decimalPart = $number % 100;
            $number /= 100;
            if ($decimalPart == 0) {
                return number_format($number, 0, ',', ' ');
            } else {
                return number_format($number, 2, ',', ' ');
            }
        }
        return number_format($number, 0, ',', ' ');
    }
} 