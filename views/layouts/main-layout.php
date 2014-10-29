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
                    <article id="site-description">Свободная торговая площадка в области портняжного дела</article>
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
<!--                    <div id="personal" class="non-authorized">-->
<!--                        <p class="welcome">Здравствуй гость!</p>-->
<!--                        <div id="signup-button" class="button yellow">-->
<!--                            <div class="low-layer"></div>-->
<!--                            <a data-type="button" href="/signup/"><i class="icon icon-person-white"></i><span>Регистрация</span></a>-->
<!--                        </div>-->
<!--                        <div id="login-button" class="button">-->
<!--                            <div class="low-layer"></div>-->
<!--                            <a data-type="button" href="/login/"><i class="icon icon-login"></i><span>Войти</span></a>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div id="personal" class="authorized">
                        <menu>
                            <li><i class="icon icon-person-green"></i><a href="">Личный кабинет</a><a href="" id="logout"><i class="icon"></i></a></li>
                            <li><i class="icon icon-order"></i><a href="">Заказы</a></li>
                            <li><i class="icon icon-basket"></i><a href="">Корзина</a></li>
                            <li><i class="icon icon-message"></i><a href="">Сообщения</a></li>
                        </menu>
                    </div>
                    <a href="#" class="icon-circle icon-help" id="main-help"></a>
                </div>
                <div class="dashed scissor-right"></div>
            </header>
            <div id="left-background"></div>
            <div id="right-background"></div>
            <?php
            // На главной странице выведем блок с информацией о сайте
            if ($this->context->id == 'site' && $this->context->action->id == 'index') {
                echo $this->renderFile('@app/views/parts/about-site.php');
            }
            ?>
            <div id="content">
                <?= $content ?>
            </div>
        </div>
        <div id="footer-buffer"></div>
    </div>
    <footer>
        <div id="dark-bg"></div>
        <div id="footer-content">
            <div id="mini-logo" class="footer-col">
                <h1>Tailor <span>place</span></h1>
            </div><div class="footer-col description">
                <span>
                    Свободная торговая площадка в области портняжного дела
                </span><br>
                <span>
                    <?= date('Y') ?> г.
                </span>
            </div><div class="footer-col menu">
                <ul>
                    <li><a href="#">Ателье и магазины</a></li>
                    <li><a href="#">Товары</a></li>
                </ul>
            </div>
            <div class="contacts">
<!--                <div class="social">
                        <i class="icon vk"></i>
                    </div>-->
                <div class="feedback">
                    <a href="#">Обратная связь</a>
                </div>
            </div>
            <a href="#" id="footer-help" class="icon-circle icon-help"></a>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>