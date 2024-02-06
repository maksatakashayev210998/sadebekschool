<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Test */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Тест сұрақтары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Өзгерту', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Жою', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Сіз осы сұрақты өшіруге сенімдісіз бе?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'surak:ntext',
            'zhauap1:ntext',
            'zhauap2:ntext',
            'zhauap3:ntext',
            'duryszhauap',
            'lesson_id',
        ],
    ]) ?>

</div>
