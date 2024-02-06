<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PaketMod */

$this->title = 'Create Paket Mod';
$this->params['breadcrumbs'][] = ['label' => 'Paket Mods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paket-mod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
