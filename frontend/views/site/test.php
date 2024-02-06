<?php
use backend\models\OpenModul;
date_default_timezone_set('Asia/Almaty');

/* @var $this yii\web\View */
$user_id = \Yii::$app->user->id;
$this->title = 'Тест тапсыру беті';
?>
<div class="a1">
    <div class="container-fluid">
        <div class="cont">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/site/lesson?id=<?= $lesson->id ?>">
                        <button class="btn-artka btn-all">
                            <span class="glyphicon glyphicon-menu-left gicon" aria-hidden="true"></span>
                            Артқа
                        </button>
                    </a>
                </div>
				<div class="col-xs-12">
                            <div class="modd-desc">
                                <span>Модуль:</span> <?= $inmodul->name ?><br/>
								<span>Сабақ:</span> <?= $lesson->name ?>
                            </div>
                </div>
                <div class="courses">
					<div class="col-xs-12">
						<div class="mod-sab-name">Тест сұрақтары</div>
					</div>
                        <?php
									$i = 0;
									foreach ($test as $item) {
										$i++;
										$answer1 = $item->zhauap1;
										$answer2 = $item->zhauap2;
										$answer3 = $item->zhauap3;
										$sur = stristr($answer1, '<p>&nbsp;</p>');
										$strlen = strlen($sur);
										$len = strlen($answer1) - $strlen;
										$answer1 = substr($answer1, 0,$len);

										$sur = stristr($answer2, '<p>&nbsp;</p>');
										$strlen = strlen($sur);
										$len = strlen($answer2) - $strlen;
										$answer2 = substr($answer2, 0,$len);

										$sur = stristr($answer3, '<p>&nbsp;</p>');
										$strlen = strlen($sur);
										$len = strlen($answer3) - $strlen;
										$answer3 = substr($answer3, 0,$len);

									?>
									<div class="turTsquest" id="turnir-surak-<?=$i?>">
										<h4 class="turTsquest_tst"><p><?=$i?>.</p> <?=$item->surak?></h4>
										<div class="clear"></div>
										<div class="turTsans">
											<label class="turTslabesl">
												<?=$answer1?>
												<input type="radio" value="1" name="radio<?=$i?>">
												<span class="checkmark"></span>
											</label>
											<label class="turTslabesl">
												<?=$answer2?>
												<input type="radio" value="2" name="radio<?=$i?>">
												<span class="checkmark"></span>
											</label>
											<label class="turTslabesl">
												<?=$answer3?>
												<input type="radio" value="3" name="radio<?=$i?>">
												<span class="checkmark"></span>
											</label>
											<input type="hidden" value="<?=$item->duryszhauap?>852159" class="hashhtest" id="hashhtest<?=$i?>">
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
									</div>
									<?php
									}
									?>
								<input type="hidden" value="<?=$i?>" id="suraksum">
								<button class="turTestfinbtn" id="turnirdyayaktau664567878">Тестті аяқтау</button>
                </div>
				<div class="natizhe">
					<div class="col-xs-12">
						<div class="mod-sab-name">Тест нәтижиесі</div>
						<div class="zhalpi">Жалпы сұрақ саны: <span class="spanball" id="zhalpi"><?=$i?></span></div>
						<div class="duris">Дұрыс жауаптар саны: <span class="spanball" id="duris"><?=$i?></span></div>
						<div class="kate">Қате жауаптар саны: <span class="spanball" id="kate"><?=$i?></span></div>
					</div>
					<div class="col-xs-12">
						<br/> <br/> <br/>
						<div class="mod-sab-name" style="">Дұрыс жауаптар:</div>
						<?php $t=0;
						foreach ($test as $item) {
										$t++;
										$answer1 = $item->zhauap1;
										$answer2 = $item->zhauap2;
										$answer3 = $item->zhauap3;
										$sur = stristr($answer1, '<p>&nbsp;</p>');
										$strlen = strlen($sur);
										$len = strlen($answer1) - $strlen;
										$answer1 = substr($answer1, 0,$len);

										$sur = stristr($answer2, '<p>&nbsp;</p>');
										$strlen = strlen($sur);
										$len = strlen($answer2) - $strlen;
										$answer2 = substr($answer2, 0,$len);

										$sur = stristr($answer3, '<p>&nbsp;</p>');
										$strlen = strlen($sur);
										$len = strlen($answer3) - $strlen;
										$answer3 = substr($answer3, 0,$len);

									?>
						
									<div class="turTsquest" id="turnir-surak-<?=$i?>">
										<h4 class="turTsquest_tst"><p><?=$t?>.</p> <?=$item->surak?></h4>
										<div class="clear"></div>
										<div class="turTsans">
											<?php if($item->duryszhauap == 1) { ?>
											<label class="turTslabesl2">
												<?='<span class="dsfdsfsd">Дұрыс жауабы:</span> '.$answer1?>
											</label>
											<?php } ?>
											<?php if($item->duryszhauap == 2) { ?>
											<label class="turTslabesl2">
												<?='<span class="dsfdsfsd">Дұрыс жауабы:</span> '.$answer2?>
											</label>
											<?php } ?>
											<?php if($item->duryszhauap == 3) { ?>
											<label class="turTslabesl2">
												<?='<span class="dsfdsfsd">Дұрыс жауабы:</span> '.$answer3?>
											</label>
											<?php } ?>
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
									</div>
									<?php
									} ?>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="material-modal">
	<div class="modal fade" id="modelShow2" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document" style="margin-top:100px;">
			<div class="zhabudinatasy">
				<div class="zhabuknopkaturn" onclick="$('#modelShow2').modal('hide')">
					X
				</div>
			</div>
			<div class="modal-content2 wh padding-25 box-shadow">
				<h4 class="tolykbit">Тестті аяқтау үшін, барлық сұрақтарға жауап беріңіз.</h4>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>


<style>
.natizhe {
	display:none;
}
.dsfdsfsd {
	font-weight: 600;
    color: #23d423;
}
.duris {
    font-weight: 600;
    color: #23d423;
}
.kate {
    font-weight: 600;
    color: #fc3434;
}
.spanball {
	color: #333;
	font-family: Gilroy-Bold;
}
.turTsquest {
    display: block;
    margin-bottom: 25px;
	margin-left: 15px;
}
.turTsquest_tst {
    display: block;
    font-size: 16px;
    font-family: "Gilroy";
    margin: 0px 0px 10px;
}
.clear {
    clear: both;
}
.turTsans {
    display: block;
    width: 100%;
    padding-left: 10px;
}
.turTslabesl {
    font-family: "Gilroy";
    display: block;
    position: relative;
    padding-left: 40px;
    margin-bottom: 10px;
    cursor: pointer;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    font-weight: 400;
    color: #414141;
}

.turTslabesl {
    display: block;
    width: 100%;
}
.turTslabesl input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #fff;
    border-radius: 50%;
    border: 2px solid #5f8cff;
    margin: 0px 15px;
}
input[type="file"]:focus, input[type="radio"]:focus, input[type="checkbox"]:focus {
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px;
}
.turTslabesl:hover {
    color: #5f8cff;
}
	.turTsquest_tst p {
    float: left;
    margin-right: 5px;
}
	.turTslabesl input:checked~.checkmark:after {
    display: block;
}

.turTslabesl .checkmark:after {
    top: 3px;
    left: 3px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #5f8cff;
}
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}
.turTcateg:hover, .turTusBtn:hover, .greencongrturbtn:hover, .getCongrat:hover, .turTuttestbeg:hover, .turWeltestbast:hover, .turTestfinbtn:hover, .kaytabtn:hover {
    background: #2d60e1;
    color: #fff;
    text-decoration: none;
}

.turTestfinbtn {
    display: block;
    border-width: 1px;
    border-color: rgb(90, 132, 241);
    border-style: solid;
    border-radius: 6px;
    background-color: rgb(74, 122, 245);
    width: 165px;
    height: 38px;
    color: #fff;
    font-size: 14px;
    font-family: "Gilroy";
    margin-top: 25px;
	margin-left: 15px;
}
	.padding-25 {
    padding: 25px 35px;
}
.box-shadow {
    box-shadow: 0px 4px 8px rgb(0 0 0 / 8%);
    border-radius: 6px;
}

.wh {
    background: #fff;
}
	.tolykbit {
    display: block;
    font-size: 14px;
    color: red;
    text-align: center;
}
.zhabudinatasy {
    position: relative;
}
.zhabuknopkaturn {
    position: relative;
    background: #ff8b0d;
    width: 40px;
    height: 40px;
    border-radius: 40px;
    text-align: center;
    white-space: nowrap;
    line-height: 40px;
    cursor: pointer;
    position: absolute;
    top: -20px;
    right: -20px;
    z-index: 10;
    color: #fff;
    font-weight: 600;
}	
	
</style>