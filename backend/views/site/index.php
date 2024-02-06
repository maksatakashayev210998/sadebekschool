<?php

/* @var $this yii\web\View */

$this->title = 'Админка';
?>
<?php if (Yii::$app->user->identity->admin == 1) { ?>
    <div class="site-index">
        <div class="col-xs-12">
            <h1 style="text-align: center">Админстратор бөліміне қош келдіңіз!</h1>
        </div>
        <div class="col-sm-4 col-xs-12">
            <a href="/admin/modul/">
                <button class="sabak-kosu">
                    Курстар
                </button>
            </a>
        </div>
        <div class="col-sm-4 col-xs-12">
            <a href="/admin/inmodul/">
                <button class="sabak-kosu">
                    Модульдер
                </button>
            </a>
        </div>

        <div class="col-sm-4 col-xs-12">
            <a href="/admin/lesson/">
                <button class="sabak-kosu">
                    Сабақтар
                </button>
            </a>
        </div>
        <div class="col-sm-4 col-xs-12">
            <a href="/admin/user/">
                <button class="sabak-kosu">
                    Қолданушылар тізімі
                </button>
            </a>
        </div>
        <div class="col-sm-4 col-xs-12">
            <a href="/admin/test/">
                <button class="sabak-kosu">
                    Тест сұрақтары
                </button>
            </a>
        </div>
        <!--    <div class="col-sm-4 col-xs-12">-->
        <!--        <a href="/admin/paket/">-->
        <!--            <button class="sabak-kosu">-->
        <!--                Пакеттер-->
        <!--            </button>-->
        <!--        </a>-->
        <!--    </div>-->
        <!--    <div class="col-sm-4 col-xs-12">-->
        <!--        <a href="/admin/paketmod/">-->
        <!--            <button class="sabak-kosu">-->
        <!--                Пакетке курс қосу-->
        <!--            </button>-->
        <!--        </a>-->
        <!--    </div>-->
    </div>
<?php } else { ?>
    <h1 style="text-align: center">Сізде доступ жоқ!</h1>
<?php } ?>

<style>
    .sabak-kosu {
        width: 100%;
        height: 55px;
        text-align: center;
        background: #292929;
        color: #ffffff;
        border: 1px solid #292929;
        border-radius: 5px;
        margin-top: 30px;
        font-size: 20px;
    }
</style>