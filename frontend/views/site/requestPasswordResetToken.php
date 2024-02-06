<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Құпия сөзді қалпына келтіру';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="title-k"><?= Html::encode('Құпия сөзді еске алу') ?></h1>
                </div>
                <div class="col-xs-12">
                    <div class="site-request-password-reset">

                        <div class="reset-text">Электрондық поштаңызды толтырыңыз. Құпия сөзді қалпына келтіруге сілтеме сонда жіберіледі.</div>

                        <div class="row">
                            <div class="col-lg-5 lab1">
                                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Жіберу', ['class' => 'btn-reset btn-jiber']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .reset-text{
        padding-top: 20px;
        font-size: 18px;
        padding-bottom: 15px;
    }
    .btn-reset{
        width: 200px;
        height: 40px;
    }
	.lab1 label{
		padding-bottom: 5px;
	}
</style>
