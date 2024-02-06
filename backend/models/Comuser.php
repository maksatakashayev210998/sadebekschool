<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comuser".
 *
 * @property int $id
 * @property int $user_id
 * @property int $reply_user_id
 * @property string $coment
 */
class Comuser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'reply_user_id', 'coment'], 'required'],
            [['user_id', 'reply_user_id'], 'integer'],
            [['coment'], 'string'],
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
            'reply_user_id' => 'Reply User ID',
            'coment' => 'Coment',
        ];
    }
}
