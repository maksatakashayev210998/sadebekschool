<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Қолданушылар';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Қолданушы қосу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn'],

            //'id',
            'username',
            'password',
            'fio',
            'email:email',
			//'ip',
            'admin',
            [
                'attribute'=>'id',
                'format'=>'raw',
                'value'=>function($data){
                    return '<a href="/admin/user/mod?id='.$data->id.'">Доступы</a>';
                }
            ],

        ],
    ]); ?>
</div>
