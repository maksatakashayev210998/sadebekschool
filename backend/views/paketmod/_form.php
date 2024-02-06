<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Paket;
use backend\models\Modul;

/* @var $this yii\web\View */
/* @var $model backend\models\PaketMod */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$ads = Paket::find()->all();
foreach ($ads as $ad) {
    $items[$ad->id] = $ad->name;
}
$params = [
    'prompt' => 'Пакетті таңдаңыз...'
];

$adss = Modul::find()->all();
foreach ($adss as $ad) {
    $itemss[$ad->id] = $ad->name;
}
$paramss = [
    'prompt' => 'Курсты таңдаңыз...'
];
?>

<div class="paket-mod-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paket_id')->dropDownList($items,$params);?>

    <?= $form->field($model, 'modul_id')->dropDownList($itemss,$paramss);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
