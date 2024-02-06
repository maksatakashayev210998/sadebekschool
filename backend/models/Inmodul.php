<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "inmodul".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $description
 * @property int $modul_id
 */
class Inmodul extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $files;
    public $namekurs;


    public static function tableName()
    {
        return 'inmodul';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'modul_id'], 'required'],
            [['files'], 'file', 'extensions' => 'png, jpg, jpeg, jfif'],
            [['description'], 'string'],
            [['modul_id'], 'integer'],
            [['name', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Модуль аты',
            'img' => 'Фото',
            'files' => 'Фото',
            'description' => 'Описание',
            'modul_id' => 'Курсты таңдаңыз',
            'namekurs' => 'Курс',
        ];
    }

    public function getPostsPost()
    {
        return $this->hasOne(Modul::className(), ['id' => 'modul_id']);
    }

    public function getModulePermission()
    {
        return $this->hasOne(InmodulePermission::className(), ['inmodule_id' => 'id'])->where(['user_id' => Yii::$app->user->id]);
    }
}
