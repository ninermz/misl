<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string|null $username
 * @property string $password
 */

class Account extends \yii\db\ActiveRecord
{
    public $passwordNew;
    public $passwordRepeat;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['email', 'username'], 'required'],
            [['email', 'username'], 'unique'],
            [['email'], 'email'],
            [['passwordNew', 'passwordRepeat'], 'string', 'min' => 8, 'message' => 'Пароль должен содержать не мение 8 символов'],
            [['passwordRepeat'], 'compare', 'compareAttribute' => 'passwordNew', 'message' => 'Пароль и подтверждение пароля не совпадают'],
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->passwordNew) {
            $this->password = md5($this->passwordNew);
        }
        return parent::beforeSave($insert);
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'username' => 'Никнейм',
            'passwordNew' => 'Новый пароль',
            'passwordRepeat' => 'Подтвердите новый пароль',
        ];
    }
}