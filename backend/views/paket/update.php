<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Paket */

$this->title = 'Update Paket: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пакеттер', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Өзгерту';
?>
<div class="paket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
