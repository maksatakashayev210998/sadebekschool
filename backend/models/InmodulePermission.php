<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "inmodule_permission".
 *
 * @property int $id
 * @property int $inmodule_id
 * @property int $modul_id
 * @property int $user_id
 */
class InmodulePermission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inmodule_permission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'inmodule_id', 'user_id'], 'required'],
            [['id', 'inmodule_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inmodule_id' => 'Inmodule ID',
            'user_id' => 'User ID',
        ];
    }

    public function getInModuleName()
    {
        return $this->hasOne(Inmodul::className(), ['id' => 'inmodule_id']);
    }
}
