<?php

/* @var $this yii\web\View */
$user_id = \Yii::$app->user->id;
$this->title = '1024 | Сұрақ-жауап';
$san = 0;
?>

<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title-k pbottom">Платформаға қатысты сұрақтар</div>
                </div>

                <div class="col-xs-12">
                    <div class="pox clik-open">
                        <div class="pox1">
                            1. Видеоларды жүктей алмай жатырмын. Қалай жүктеп алса болады?
                        </div>
                        <div class="vverh">
                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                        </div>
                        <div class="pox2 clik-close" style="display: none;">
                            Авторлық құқық сақталу барысында, аудио, видео файлдарды жүктеп алуға болмайды.
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="pox clik-open">
                        <div class="pox1">
                            2.Видеолар ашылмай жатыр,не істеймін?
                        </div>
                        <div class="vverh">
                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                        </div>
                        <div class="pox2 clik-close" style="display: none;">
                            Біз жақтан қателік жоқ. Видео ашылмаса біріншіден интернет жылдамдығы төмен болуы мүмкін. Екіншіден басқа браузермен ашып көріңіз, баптамалары өзгеше болу керек. Үшіншіден техникалық құрылғыңызды ауыстырып, басқа жерден кіріп көріңіз.
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="pox clik-open">
                        <div class="pox1">
                            3. Аккаунт құлыпталып қалса не істеймін?
                        </div>
                        <div class="vverh">
                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                        </div>
                        <div class="pox2 clik-close" style="display: none;">
                            Бір логиньмен 3 құрылғыдан артық құрылғымен кіруге болмайды.Егер сондай жағдай орын алса менеджерге жазыңыз.
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="pox clik-open">
                        <div class="pox1">
                            4. Сабақтарға доступ ашылмай қалса не істеймін?
                        </div>
                        <div class="vverh">
                            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                        </div>
                        <div class="pox2 clik-close" style="display: none;">
                            Егер бұндай жағдай орын алса сіздің сабақтарға доступ алу мерзіміңіз аяқталды деген сөз.
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .pox {
        background: #ffffff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.08);
        border-radius: 6px;
        height: auto;
        display: block;
        margin-bottom: 25px;
        width: 100%;
        float: left;
    }
    .pox1 {
        font-size: 18px;
        padding: 20px;
        padding-right: 0;
        cursor: pointer;
        width: 90%;
        float: left;
        font-weight: bold;

    }
    .vverh {
        width: 30px;
        float: right;
        margin-right: 15px;
        margin-top: 20px;
        cursor: pointer;
    }
    .pox2 {
        font-size: 16px;
        line-height: 1.5;
        padding: 20px;
        padding-top: 15px;
        width: 100%;
        border-bottom-right-radius: 6px;
        border-bottom-left-radius: 6px;
        float: left;
        background: #f3f3f3;
        font-weight: bold;
        font-family: "Montserrat";
        font-style: italic;
    }
    .pbottom{
        padding-bottom: 40px;
    }
    @media (max-width: 767px) {
        .pox1 {
            font-size: 15px;
            padding: 20px;
            padding-right: 0;
            width: 90%;
            float: left;
            font-weight: bold;
        }
        .vverh {
            width: 10%;
            float: right;
            margin-right: 0px;
            margin-top: 20px;
            cursor: pointer;
        }
        pox2 {
            font-size: 14px;
            line-height: 1.5;
            padding: 20px;
            padding-top: 15px;
        }
    }
</style>
