<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $time
 * @property integer $p_id
 * @property integer $status
 * @property string $author
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $verifyCode;

    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'author'], 'required'],
            [['content'], 'string'],
            [['time', 'p_id', 'status'], 'integer'],
            [['author'], 'string', 'max' => 128],
            ['verifyCode', 'required'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'time' => 'Time',
            'p_id' => 'P ID',
            'status' => 'Status',
            'author' => 'Author',
            'verifyCode' => 'verifyCode',
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            $this->time = time();
            $this->status = '1';
            $this->p_id = Yii::$app->request->get('article');
            return true;
        }else{
            return false;
        }

    }
}
