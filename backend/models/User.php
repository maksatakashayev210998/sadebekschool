<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $fio
 * @property string $email
 * @property int $admin
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'fio'], 'required'],
            [['admin'], 'integer'],
            [['username', 'fio', 'email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 100],
            [['username'], 'unique'],
            //  [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Номер',
            'password' => 'Пароль',
            'fio' => 'Аты-жөні',
            'email' => 'E-mail',
            'admin' => 'Админ',
        ];
    }
}
