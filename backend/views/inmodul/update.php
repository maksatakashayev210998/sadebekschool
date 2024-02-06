<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Inmodul */

$this->title = 'Өзгерту: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Модульдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Өзгерту';
?>
<div class="inmodul-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
