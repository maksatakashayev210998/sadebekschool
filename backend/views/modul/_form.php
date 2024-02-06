<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Modul */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modul-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <img style="width: 300px" src="<?= $model->img; ?>" alt="">
    <?php
    if ($model->img == null){
        echo "Фото жоқ";
    }else{
        echo Html::a("<img src='/img/delete.png'>", ['deleteimg', 'id'=>$model->id], ['class'=>'cnop']).'<p>';
    }
    ?>
    <?= $form->field($model, 'files')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сақтау', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>