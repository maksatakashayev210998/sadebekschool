$('#modtanda').on('change', function () {
    $.ajax({
        url: '/admin/lesson/modultandau',
        data: {id: this.value},
        type: 'GET',
        success: function (data) {
            $('#inmodtanda').html(data);
        },
        error: function () {
            alert('Error!');
        }
    });
});

$("#phone").mask("8(999) 999-9999");
$("#phone2").mask("8(999) 999-9999");
$(".phonemask").mask("8(999) 999-9999");