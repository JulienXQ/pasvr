<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/20 0020
 * Time: 15:53
 */

namespace frontend\models;

use yii\db\ActiveRecord;
use yii\helpers\Url;
class GetPost extends ActiveRecord
{
    public static function tableName()
    {
        return 'post';
    }

    public static function tagsArr($string){
        $arr = explode(' ',$string);
        $tagsStr = '';
        foreach($arr as $i => $tag){
            if($i>0){
                $tagsStr .= '，<a href="'.Url::to(['site/tag', 'tag' => $tag]).'">'.$tag.'</a>';
            }else{
                $tagsStr .= '<a href="'.Url::to(['site/tag', 'tag' => $tag]).'">'.$tag.'</a>';
            }

        }
        //echo $tagsStr;
        return $tagsStr;
    }
}