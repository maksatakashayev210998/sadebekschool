<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Lesson;

/* @var $this yii\web\View */
/* @var $model backend\models\Test */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$ads = Lesson::find()->all();
foreach ($ads as $ad) {
    $items[$ad->id] = $ad->name;
}
$params = [
    'prompt' => 'Сабақты таңдаңыз...'
];
?>
<div class="test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surak')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'zhauap1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'zhauap2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'zhauap3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'duryszhauap')->textInput() ?>
	
	<?= $form->field($model, 'lesson_id')->dropDownList($items,$params);?>

    <div class="form-group">
        <?= Html::submitButton('Сақтау', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
