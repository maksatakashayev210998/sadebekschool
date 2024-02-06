<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ModulSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курстар';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modul-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Курс қосу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'img',
            [
                'attribute' => 'description',
                'value' => function($data) {
                    $charsCount = 80;
                    $croppedText = mb_substr($data->description, 0, $charsCount);
                    return mb_strlen($data->description) > 50 ?  $croppedText : $data->description;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
