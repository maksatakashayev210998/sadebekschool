<?php

/* @var $this yii\web\View */
$user_id = \Yii::$app->user->id;
$this->title = '1024 | Ережелер';
?>

<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title-k pbottom">Курс қалай өтеді?</div>
                </div>

                <div class="col-xs-12">
                        <div class="reg-txt">

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .reg-txt {
        font-size: 17px;
        line-height: 1.5;
        padding-top: 40px;
        font-family: "Montserrat-Medium";
    }
    @media (max-width: 767px) {
        .reg-txt {
            font-size: 15px;
            padding-top: 30px;
        }
    }
</style>
