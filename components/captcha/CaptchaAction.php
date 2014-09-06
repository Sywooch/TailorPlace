<?php

namespace app\components\captcha;

/**
 * Кастомная капча на основе стандартной капчи Yii2
 */
class CaptchaAction extends \yii\captcha\CaptchaAction
{
	/**
	 * Ширина картинки капчи
	 * @var integer
	 */
	public $width = 130;
	/**
	 * Высота картинки капчи
	 * @var integer
	 */
	public $height = 60;
	    /**
     * @var Минимальная длина генерируемого кода
     */
    public $minLength = 5;
    /**
     * @var Максимальная длина генерируемого кода
     */
    public $maxLength = 5;
	/**
	 * Размер шрифта, используемого в капче
	 * @var integer
	 */
	public $fontSize = 17.5;

	/**
	 * Количество символов фона
	 * @var integer
	 */
	public $bgQuantity = 40;

	/**
	 * Симфолы
	 * @var array
	 */
	public $letters = array('a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z','2','3','4','5','6','7','9');

	/**
	 * Цвета символов
	 * @var array
	 */
	public $colors = array('10','30','50','70','90','110','130','150','170','190','210');

	/**
	 * Путь к шрифту
	 * @var string
	 */
	public $fontFile = '@root/components/captcha/cour.ttf';

	/**
	 * Генерация верификационного кода
	 * @return string
	 */
	protected function generateVerifyCode()
	{
        $length = mt_rand($this->minLength, $this->maxLength);
        $code = '';
        for ($i = 0; $i < $length; ++$i) {
        	$code .= $this->letters[rand(0, sizeof($this->letters) - 1)];
        }
        return $code;
	}

	/**
	 * Генерация изображения капчи
	 * @param  string $code Код для отображения в капче
	 * @return string image contents in PNG format.
	 */
	protected function renderImageByGD($code)
	{
		$image = imagecreatetruecolor($this->width, $this->height);
		$backColor = imagecolorallocate($image, 255, 255, 255);
		imagefill($image, 0, 0, $backColor);

		// Генерируем фоновые символы
		for ($i=0; $i < $this->bgQuantity; $i++) {
			$color = imagecolorallocatealpha(
				$image,
				rand(0,255),
				rand(0,255),
				rand(0,255),
				100
			);
			$letter = $this->letters[rand(0, sizeof($this->letters) - 1)];
			$size = rand($this->fontSize - 2, $this->fontSize + 2);
			imagettftext(
				$image,
				$size,
				rand(-30, 45),
				rand($this->width * 0.1, $this->width - $this->width * 0.1),
				rand($this->height * 0.2, $this->height),
				$color,
				$this->fontFile,
				$letter
			);
		}

		// Рисуем основной код
		$length = strlen($code);
		for ($i=0; $i < $length; $i++) {
			$color = imagecolorallocatealpha(
				$image,
				$this->colors[rand(0, sizeof($this->colors) - 1)],
				$this->colors[rand(0, sizeof($this->colors) - 1)],
				$this->colors[rand(0, sizeof($this->colors) - 1)],
				rand(20, 40)
			);
			$letter = $code[$i];
			$size = rand($this->fontSize * 2.1 - 2, $this->fontSize * 2.1 + 2);
			$x = ($i + 1) * $this->fontSize + rand(4, 7);
			$y = (($this->height * 2) / 3) + rand(0, 5);
			imagettftext(
				$image,
				$size,
				rand(-5,15),
				$x,
				$y,
				$color,
				$this->fontFile,
				$letter
			);
		}

		ob_start();
		imagepng($image);
		imagedestroy($image);

        return ob_get_clean();
	}
}