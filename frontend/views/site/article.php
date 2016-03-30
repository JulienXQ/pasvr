<?php
use yii\helpers\Html;
use frontend\models\GetPost;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/24 0024
 * Time: 15:36
 */
?>
<h1><?= Html::encode($article['title']);?></h1>
    <div class="time"><span><i class="icon-time"> </i><?= Html::encode(date('Y-m-d', $article['create_time']));?></span></div>
    <div><i class="icon-tags"></i><?= GetPost::tagsArr($article['tags']);?></div>
<?= $article['content'];?>
<hr/>
<div class="comments">
    <?php foreach($comments as $comment){?>
        <div class="comment"><i class="icon-time"></i><?= Html::encode(date('Y-m-d', $comment['time']));?> <i class="icon-user"> </i><?= Html::encode($comment['author']);?></div>
        <?= Html::encode($comment['content']);?>
    <?php }?>
    <br/>
</div>
<hr/>

<div class="write_comment">
    <div class="comment-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>

        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
