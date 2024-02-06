<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PaketModSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пакет курстары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-mod-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Пакетке курс қосу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn'],

            //'id',
            //'paket_id',
            [
                'attribute'=>'namepaket',
                'value'=>'postsPost.name'
            ],
            //'modul_id',
            [
                'attribute'=>'namemod',
                'value'=>'postssPost.name'
            ],

        ],
    ]); ?>
</div>
