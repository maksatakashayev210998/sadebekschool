<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "coment".
 *
 * @property int $id
 * @property string $coment
 * @property int $sabak_id
 * @property int $date
 * @property int $time
 * @property int $user_id
 */
class Coment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coment', 'sabak_id'], 'required'],
            [['coment'], 'string'],
            [['sabak_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'coment' => 'Комментарий',
            'sabak_id' => 'Сабақ ID',
        ];
    }
    public function getDate(){
        Yii::$app->formatter->locale = 'ru-RU';
        return Yii::$app->formatter->asDate($this->date);
    }
}
