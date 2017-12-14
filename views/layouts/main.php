<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\BaseUrl;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <script src="<?=yii\helpers\Url::base()."/js/jquery.js";?>"></script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="./favicon.ico?v=1?v=1" type="image/x-icon"  />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>
<body >
<?php $this->beginBody() ?>

    <div class="wrap" style="background-color: yellow">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/iconos/carreta.png'   , ['alt'=>Yii::$app->name]),
        'options' => [
            'class' => 'navbar navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index'],'visible'=>Yii::$app->user->isGuest],            
            ['label' => 'Historia', 'url' => ['/site/about'],'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Productos', 'url' => ['/site/inventario'],'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Contacto', 'url' => ['/site/contact'],'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Ubicación', 'url' => ['/site/locacion'],'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Ingresar', 'url' => ['/site/login'],'visible'=>Yii::$app->user->isGuest],
            ['label' => 'Productos', 'url' => ['/producto/index'],'visible'=>!Yii::$app->user->isGuest],
            ['label' => 'Salir (administrador)', 'url' => ['/site/logout'],'visible'=>!Yii::$app->user->isGuest],
            //['label' => '¿Quienes Somos?', 'url' => ['/site/somos']],
        ],
    ]);
    NavBar::end();
    ?>
    <br><br><br>
    <div class="container" style="background-color: yellow">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>
    <style>
        .navbar{
            background-color:#f39334;
            border-color:#f39334;
            text-align: center;
        }
        .navbar-right{
            
        }
        .navbar-brand img{
            margin-top: -10px;
        }
        .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus{
            background-color:#6fc1c1;
        }
        .navbar-inverse .navbar-nav > li > a{
            color: white;
        }
        @font-face {
            font-family: "Open-Sans";
            font-style: normal;
            font-weight: normal;
            src: local("?"), url("/fonts/futurastd-light-webfont.woff") format("woff"), url("/fonts/futurastd-light-webfont.ttf") format("truetype");
        }
    </style>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
