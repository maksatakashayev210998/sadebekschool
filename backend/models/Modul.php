<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "modul".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $description
 */
class Modul extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $files;


    public static function tableName()
    {
        return 'modul';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['files'], 'file', 'extensions' => 'png, jpg, jpeg, jfif'],
            [['description'], 'string'],
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
            'name' => 'Курстың аты',
            'img' => 'Фото',
            'files' => 'Фото',
            'description' => 'Описание',
        ];
    }
}
