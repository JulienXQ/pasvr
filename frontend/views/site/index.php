<?php
use yii\helpers\Html;
use frontend\models\GetPost;
use common\widgets\TagsCloudWidget;
/* @var $this yii\web\View */



$this->title = 'My Yii Application';
?>
<div class="site-index">
    <ol class="breadcrumb">
        <li><a href="<?= Yii::$app->homeUrl;?>">首页</a></li>
        <li>文章列表</li>
    </ol>
    <?php foreach ($posts as $post){?>
        <div class="title">
            <a href="/site/<?= Html::encode($post->id);?>.html"><h2><?= Html::encode($post->title);?></h2></a>
            <span><i class="icon-time"> </i><?= Html::encode(date('Y-m-d', $post->create_time));?></span>
        </div>
        <div class="content">
            <?= mb_substr(strip_tags($post->content),0,288,'utf-8'); ?>
            <?= mb_strlen(strip_tags($post->content))>288?'......':'';?>
        </div>
        <div><i class="icon-tags"> </i><?= GetPost::tagsArr($post->tags);?></div>
        <hr/>
    <?php }?>
    <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]);?>
</div>
