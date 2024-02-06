<?php
use yii\helpers\Html;
?>


<div class="reset-block">
    <div class="in">
        <div class="container">
            <div class="row">
                <a href="/">
                    <button class="btn-artka btn-all">
                        <span class="glyphicon glyphicon-menu-left gicon" aria-hidden="true"></span>
                        Артқа
                    </button>
                </a>
                <div class="courses cart_reset">
                    <?php if( Yii::$app->session->hasFlash('error') ): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo Yii::$app->session->getFlash('error'); ?>
                        </div>
                    <?php endif;?>
                    <div class="title-reset">
                        Құпия сөзді қалпына келтіру
                    </div>
                    <div class="zag-reset">
                        Құпия сөзді қалыпқа келтіру үшін төмендегі форманы толтырып жіберіңіз. Сіз көрсеткен E-mail адреске хаттама болып барады.
                    </div>
                    <form action="/site/resetpass" method="get">
                        <label class="lbl-reset" for="">Аккаунтыңызға тіркелген E-mail</label> <br>
                        <input placeholder="E-mail" class="inp-reset form-control" name="email" type="email" required>
                        <input class="sub-reset btn " type="submit" value="Жіберу">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
