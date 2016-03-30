<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $content
 * @property string $time
 * @property integer $p_id
 * @property integer $status
 * @property string $author
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['content', 'p_id', 'author'], 'required'],
            [['content'], 'string'],
            [['time'], 'safe'],
            [['p_id', 'status'], 'integer'],
            [['author'], 'string', 'max' => 128]
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
        ];
    }

    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
            $this->time = time();
            $this->status = '1';
            return true;
        }else{
            return false;
        }

    }
}
