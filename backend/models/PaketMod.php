<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "paket_mod".
 *
 * @property int $id
 * @property int $paket_id
 * @property int $modul_id
 */
class PaketMod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $namepaket;
    public $namemod;


    public static function tableName()
    {
        return 'paket_mod';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paket_id', 'modul_id'], 'required'],
            [['paket_id', 'modul_id'], 'integer'],
            [['namepaket', 'namemod'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paket_id' => 'Пакет',
            'modul_id' => 'Курс',
            'namepaket' => 'Пакет',
            'namemod' => 'Курс',
        ];
    }
    public function getPostsPost(){
        return $this->hasOne(Paket::className(),['id'=>'paket_id']);
    }
    public function getPostssPost(){
        return $this->hasOne(Modul::className(),['id'=>'modul_id']);
    }
}
