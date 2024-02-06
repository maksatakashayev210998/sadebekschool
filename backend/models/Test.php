<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $surak
 * @property string $zhauap1
 * @property string $zhauap2
 * @property string $zhauap3
 * @property int $duryszhauap
 * @property int $lesson_id
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surak', 'zhauap1', 'zhauap2', 'zhauap3', 'duryszhauap', 'lesson_id'], 'required'],
            [['surak', 'zhauap1', 'zhauap2', 'zhauap3'], 'string'],
            [['duryszhauap', 'lesson_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surak' => 'Сұрақ',
            'zhauap1' => 'Нұсқа №1',
            'zhauap2' => 'Нұсқа №2',
            'zhauap3' => 'Нұсқа №3',
            'duryszhauap' => 'Дұрыс жауап №',
            'lesson_id' => 'Сабақ ID',
        ];
    }
}
