<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LessonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сабақтар';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Сабақ қосу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn'],

            //'id',
            'name',
//            [
//                'attribute' => 'description',
//                'value' => function($data) {
//                    $charsCount = 80;
//                    $croppedText = mb_substr($data->description, 0, $charsCount);
//                    return mb_strlen($data->description) > 50 ?  $croppedText : $data->description;
//                }
//            ],
//            [
//                'attribute' => 'video',
//                'value' => function($data) {
//                    $charsCount = 50;
//                    $croppedText = mb_substr($data->video, 0, $charsCount);
//                    return mb_strlen($data->video) > 50 ?  $croppedText : $data->video;
//                }
//            ],
            //'video2',
            //'video3',
            //'file',
            //'file2',
            //'modul_id',
            [
                'attribute'=>'namekurs',
                'value'=>'postsPost.name'
            ],
            [
                'attribute'=>'nameinmodul',
                'value'=>'postssPost.name'
            ],

        ],
    ]); ?>
</div>
