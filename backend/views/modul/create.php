<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Modul */

$this->title = 'Курс қосу';
$this->params['breadcrumbs'][] = ['label' => 'Курстар', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modul-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
