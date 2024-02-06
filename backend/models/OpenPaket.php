<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "open_paket".
 *
 * @property int $id
 * @property int $user_id
 * @property int $paket_id
 */
class OpenPaket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'open_paket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time'], 'string', 'max' => 100],
            [['user_id', 'paket_id'], 'required'],
            [['user_id', 'paket_id', 'status', 'day'], 'integer'],
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
            'paket_id' => 'Paket ID',
            'day' => 'Күн',
        ];
    }
}
