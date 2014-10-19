<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
<!--    --><?//= Html::cssFile('@web/css/style.css') ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div id="wrapper">
        <div id="center-wrapper">
            <header>
                <div id="l-h-spiral"></div>
                <div id="r-h-spiral"></div>
<!-- header-col выстроены в линию, и важно, чтобы не было пробельного символа между тегами -->
                <div class="header-col">
                    <div id="logo">
                        <h1>Tailor <span>place</span></h1>
                    </div>
                </div><div class="header-col">
                    <h2 id="site-description">Свободная торговая площадка в области портняжного дела</h2>
<!-- TODO <nav> сделать виджетом, чтобы активную ссылку удобней было ставить -->
                    <nav>
                        <div class="top-line"></div>
                        <ul>
                            <li>
                                <a href="#">Ателье и магазины</a>
                            </li>
                            <li>
                                <a href="#">Товары</a>
                            </li>
                            <li>
                                <a href="#">Хочу это</a>
                            </li>
                        </ul>
                        <div class="bottom-line"></div>
                    </nav>
                    <form id="search" method="post">
                        <div class="input-group dropdown-group dropdown-left-group">
                            <div class="input-group-btn">
                                <button data-toggle="dropdown" class="btn btn-default" type="button">Ател./Маг. <span class="caret"></span></button>
                                <div class="vertical-divider"></div>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Ател./Маг.</a></li>
                                    <li><a href="#">Ателье</a></li>
                                    <li><a href="#">Магазины</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Товары</a></li>
                                </ul>
                            </div><!-- /btn-group -->
                            <input type="text" class="form-control">
                            <button id="search-submit" class="btn btn-default" type="submit"></button>
                        </div>
                    </form>
                </div><div class="header-col">
<!-- TODO сделать виджетом -->
                    <div id="personal" class="non-authorized">
                        <p class="welcome">Здравствуй гость!</p>
                        <div id="signup-button" class="button yellow">
                            <div class="low-layer"></div>
                            <button type="button"><i class="icon person-white"></i> Регистрация</button>
                        </div>
                        <div id="login-button" class="button">
                            <div class="low-layer"></div>
                            <button type="button"><i class="icon login-icon"></i> Войти</button>
                        </div>
                    </div>
<!--                    <div id="personal" class="authorized">-->
<!---->
<!--                    </div>-->
                    <div class="help-icon" id="main-help"></div>
                </div>
            </header>
            Юбка-солнце
        </div>
        <div id="footer">
            Футер
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>