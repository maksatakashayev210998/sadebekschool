<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PaketMod */

$this->title = 'Update Paket Mod: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paket Mods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paket-mod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
