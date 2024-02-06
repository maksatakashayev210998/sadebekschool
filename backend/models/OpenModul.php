<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "open_modul".
 *
 * @property int $id
 * @property int $user_id
 * @property int $modul_id
 * @property int $status
 */
class OpenModul extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'open_modul';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time'], 'string', 'max' => 100],
            [['user_id', 'modul_id'], 'required'],
            [['user_id', 'modul_id', 'status', 'day'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'modul_id' => 'Modul ID',
            'status' => 'Status',
            'day' => 'Күн',
        ];
    }
}
