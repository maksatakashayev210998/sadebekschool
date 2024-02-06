$(".menu-block2").click(function () {
    $(".menu-box").slideToggle("speed");
});

$(".clik-open").click(function () {
    $(this).find('.clik-close').slideToggle(300);
});

$("#phone").mask("8(999) 999-9999");
$("#phone2").mask("8(999) 999-9999");

$("#turnirdyayaktau664567878").click(function () {
		//alert("test");
		var testdf = 0;
		var tolykemes = 0;
		var kolich = 0;
		var ball = 0;
		var kate = 0;
		var k, i, elements, radio;
		var dffdg;
		var testdsfsdf;
		var testdsfsdf2;
		var hjggfh;
		var suraksum = $('#suraksum').val();
			
		for (k = 1; k <= suraksum; k++) {
			radio = "radio" + k;
			dffdg = "#turnir-surak-" + k;
			// alert(radio);
			elements = document.getElementsByName(radio);
			if (elements) {
				testdf = 0;
				for (i = 0; i < elements.length; i++) {
					if (elements[i].checked) {
						kolich++;
						testdsfsdf = $('#hashhtest' + k).val();
						testdsfsdf = testdsfsdf * 1;
						testdsfsdf2 = elements[i].value + "852159";
						testdsfsdf2 = testdsfsdf2 * 1;

						if (testdsfsdf2 == testdsfsdf) {
							ball++;
						}
						else kate++;

						testdf = 1;
					}
				}
				if (testdf == 0) {
					tolykemes = 1;
					break;
				}
			}
			else alert("Қате шықты! Тестті қайта тапсырыңыз.");
		}
		if (kolich < suraksum)
			$('#modelShow2').modal('show');
		else {
			//alert(ball);
			$("#duris").text(ball);
			$("#kate").text(kate);
			$(".courses").hide();
			$(".natizhe").show();
		}
	});