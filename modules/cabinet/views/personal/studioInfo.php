<?php
/**
 * @var $studioType string
 * @var $Studio app\modules\studio\models\Studio
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>
<div class="dashed scissor-right"></div>
<div id="studio-data" class="info-wrapper">
    <h4 class="icon-line big-red-medium"><i class="icon store"></i><span><?= $studioType ?></span></h4>
    <div class="button">
        <div class="low-layer"></div>
        <a data-type="button" href="<?= Url::toRoute('studio-redact') ?>">Редактировать</a>
    </div>
	<ul>
		<li>
			<div class="left-col">Название</div>
			<div class="right-col"><?= Html::encode($Studio->name) ?></div>
		</li>
		<li>
			<div class="left-col">Дата регистрации</div>
			<div class="right-col"><?= date_format(date_create($Studio->create_time), 'd.m.Y') ?></div>
		</li>
		<li>
			<div class="left-col">Слоган</div>
			<div class="right-col"><?= Html::encode($Studio->slogan) ?></div>
		</li>
		<li>
			<div class="left-col">Описание</div>
			<div class="right-col"><?= Html::encode($Studio->description) ?></div>
		</li>
        <li>
            <div class="left-col">Способ доставки</div>
            <div class="right-col">
                <ul class="sublist">
                    <li class="icon-line"><i class="icon mail-delivery"></i><span>Доставка почтой</span></li>
                    <li class="icon-line"><i class="icon express-delivery"></i><span>Курьерская доставка</span></li>
                    <li class="icon-line"><i class="icon personal-meeting"></i><span>При личной встрече</span></li>
                    <li class="icon-line"><i class="icon other"></i><span>Другой способ</span></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="left-col">Способ доставки</div>
            <div class="right-col">
                <ul class="sublist">
                    <li class="icon-line"><i class="icon webmoney"></i><span>WebMoney</span></li>
                    <li class="icon-line"><i class="icon yandex-money"></i><span>Яндекс деньги</span></li>
                    <li class="icon-line"><i class="icon mail-transfer"></i><span>Почтовый перевод</span></li>
                    <li class="icon-line"><i class="icon bank-transfer"></i><span>Банковский перевод</span></li>
                    <li class="icon-line"><i class="icon by-cash-when-meeting"></i><span>Наличными при встрече</span></li>
                    <li class="icon-line"><i class="icon qiwi"></i><span>QIWI</span></li>
                    <li class="icon-line"><i class="icon pay-pal"></i><span>PayPal</span></li>
                </ul>
            </div>
        </li>
	</ul>
</div>