<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $repassword;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('common', 'This username has already been taken.')],
            ['username', 'string', 'min' => 4, 'max' => 20],
            ['username', 'match','pattern'=>'/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u','message'=>'用户名由字母，汉字，数字，下划线组成，且不能以数字和下划线开头。'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('common','This email address has already been taken.')],

            [['password','repassword'], 'required'],
            [['password','repassword'], 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password','message'=>'两次输入的密码不一致！'],

            ['verifyCode', 'required'],
            ['verifyCode', 'captcha'],
        ];
    }

    /*
     *将对应input的label描述转换为中文
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'username'),
            'password' => Yii::t('common', 'password'),
            'email' => Yii::t('common', 'email'),
            'repassword' => Yii::t('common', 'repassword'),
            'verifyCode' => Yii::t('common', 'verifyCode'),
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
