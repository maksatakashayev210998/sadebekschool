<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Modul;
use backend\models\Inmodul;

/* @var $this yii\web\View */
/* @var $model backend\models\Lesson */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$modul = Modul::find()->orderBy('id ASC')->all();
foreach ($modul as $value) {
    $arrModul[$value->id] = $value->name;
}

$inmodul = Inmodul::find()->orderBy('id ASC')->all();
foreach ($inmodul as $value) {
    $arrInmodul[$value->id] = $value->name;
}
?>
<div class="lesson-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'homework')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'homework')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'opendate')->textInput(['type' => 'datetime-local']) ?>
	
	<?= $form->field($model, 'test')->textInput(['maxlength' => true]) ?>

    <?php
    if ($model->file !=null) {
        echo '<label for="">Қосымша материал</label>';
        echo '<i style="font-size:25px;" class="fa fa-file-word-o" aria-hidden="true" ></i>
           <span>'.$model->file.'&nbsp;&nbsp;&nbsp;<span>';
        echo Html::a('Удалить файл', ['deletefile', 'id'=>$model->id], ['class'=>'btn btn-danger']).'<p>';

    }else{
        ?>
        <? echo $form->field($model, 'files')->fileInput();
    }  ?>

    <?= $form->field($model, 'file2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modul_id')->dropDownList($arrModul, ['prompt' => 'Курсты таңдаңыз', 'id' => 'modtanda']);?>

    <?= $form->field($model, 'inmodul_id')->dropDownList($arrInmodul, ['prompt' => 'Модульді таңдаңыз', 'id' => 'inmodtanda']);?>


    <div class="form-group">
        <?= Html::submitButton('Сақтау', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
