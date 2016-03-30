<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('common', 'homeName'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '<i class="icon-home"></i> '.Yii::t('common', 'Home'), 'url' => Yii::$app->homeUrl],
        ['label' => '<i class="icon-barcode"></i> '.Yii::t('common', 'About'), 'url' => ['/site/about']],
        ['label' => '<i class="icon-edit"></i> '.Yii::t('common', 'Contact'), 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '<i class="icon-plus-sign"></i> '.Yii::t('common', 'Signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' => '<i class="icon-signin"></i> '.Yii::t('common', 'Login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => '<i class="icon-user"></i> '.Yii::$app->user->identity->username,
            'items' => [
               [ 'label' => '<i class="icon-signout"></i> '.Yii::t('common', 'Logout'), 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post'],],
            ],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
