<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Lesson */

$this->title = 'Сабақ өзгерту: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сабақтар', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Өзгерту';
?>
<div class="lesson-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
