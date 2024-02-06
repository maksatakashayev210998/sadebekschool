<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Жаңа құпия сөзді жазыңыз';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="title-k"><?= Html::encode('Жаңа құпия сөзді жазыңыз') ?></h1>
                </div>

                <div class="col-xs-12">
                    <div class="site-reset-password">
                        <div class="row">
                            <div class="col-lg-5 lab1">
                                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Сақтау', ['class' => 'btn-reset btn-jiber']) ?>
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
    .reset-pp{
        padding-bottom: 150px;
    }
    .reset-text{
        font-size: 18px;
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .btn-reset{
        width: 200px;
        height: 40px;
    }
	.lab1 label{
		padding-bottom: 5px;
	}
	.site-reset-password{
		padding-top: 15px;
	}
</style>