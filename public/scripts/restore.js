
$(document).ready(function() {
    var url,data;
    $('td').on('click', 'a.delete', function () {
        url='';data='';
        _this = $(this).closest('tr');
        url = _this.data('route');
        data = "_method=DELETE";
        data=data+'&_token='+$('#token').val();
        data=data+'&type=restore';
    });
    $('.confirm').click(function () {

        $.post(url, data, function (res) {
            $(".close")[0].click();
            if (res.success == true) {
                new PNotify({
                    title: "Done",
                    text: res.msg,
                    type: 'success',
                    hideAfter:4000,
                    styling: 'bootstrap3',
                });
                _this.remove();
            }
            else {
                new PNotify({
                    title:res.title,
                    text: res.msg,
                    type: 'error',
                    hideAfter:4000,
                    styling: 'bootstrap3'
                });

            }
        },'json');

    });

});
