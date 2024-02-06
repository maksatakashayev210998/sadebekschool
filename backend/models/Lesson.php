<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $video
 * @property string $video2
 * @property string $video3
 * @property string $file
 * @property string $file2
 * @property int $modul_id
 * @property int $inmodul_id
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $files;
    public $namekurs;
    public $nameinmodul;


    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'video', 'modul_id', 'inmodul_id'], 'required'],
            [['description', 'homework'], 'string'],
            [['modul_id', 'inmodul_id', 'test'], 'integer'],
            [['name', 'video', 'video2', 'video3', 'file2', 'namekurs'], 'string', 'max' => 255],
            [['opendate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Сабақтың тақырыбы',
            'opendate' => 'Сабақтың ашылу уақыты',
            'description' => 'Түсініктеме',
            'video' => 'Видео(iframe ссылка)',
            'video2' => 'Видео(iframe ссылка)',
            'video3' => 'Видео(iframe ссылка)',
            'homework' => 'Үй тапсырмасы',
            'file' => 'Файл(сайтқа жүктелінетін)',
            'files' => 'Қосымша материал(сайтқа жүктелінетін)',
            'file2' => 'Материал ссылкасы(дискта жатқан)',
            'modul_id' => 'Курсты таңдаңыз',
            'namekurs' => 'Курс',
            'nameinmodul' => 'Модуль',
			'test' => 'Тест (0/1)',
        ];
    }
    public function getPostsPost(){
        return $this->hasOne(Modul::className(),['id'=>'modul_id']);
    }
    public function getPostssPost(){
        return $this->hasOne(Inmodul::className(),['id'=>'inmodul_id']);
    }
}
