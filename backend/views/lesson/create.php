<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Lesson */

$this->title = 'Сабақ қосу';
$this->params['breadcrumbs'][] = ['label' => 'Сабақтар', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lesson-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
