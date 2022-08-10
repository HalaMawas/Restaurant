/**
 * Created by Cesaer on 28/05/2017.
 */

$(document).ready(function(){

    var name_en,name_sv;
    $('td').on('click','button.edit',function(){
        if($('.cancel').length!=0){
            $('.cancel')[0].click();
        }
        name_en = $(this).closest('tr').find('td:nth-child(1)').text();
        // name_sv = $(this).closest('tr').find('td:nth-child(3)').text();
        $(this).parents('td').append('<button  class="btn-primary cancel" style="margin-right: 10px;border:0px;"><i class="icon-android-close"></i></button>');
        $(this).parents('td').append('<button  class="btn-primary save" style="border:0px;"><i class="icon-save"></i></button>');
        $(this).closest('tr').find('td:nth-child(1)').html('<input type="text" class="form-control" style="width:90%" value="'+name_en+'">');
        // $(this).closest('tr').find('td:nth-child(3)').html('<input type="text" class="form-control" style="width:90%" value="'+name_sv+'">');
        $(this).remove();
    });

    $('td').on('click','button.cancel',function(){
        $(this).closest('td').append('<button  type="button" class="btn btn-primary edit" style="border:0px;" ><i class="icon-edit"></i></button>');
        $(this).parents('tr').find('td:nth-child(1)').text(name_en);
        // $(this).parents('tr').find('td:nth-child(3)').text(name_sv);
        $(this).parents('td').find('.save').remove();
        $(this).remove();

    });

    $('td').on('click','button.save',function(){
        _this=$(this).closest('tr');
        var new_name_en=_this.find('td:nth-child(1) input').val();
        // var new_name_sv=_this.find('td:nth-child(3) input').val();
        var data = "_token="+$('#token').val();
        data+="&_method=PUT"
        data = data +"&name_en="+new_name_en;
        // data+="&name_sv="+new_name_sv;
        var url = _this.data('route');

        $.post(url,data,function(res){
            if(res.success==true){
                new PNotify({
                    title:"Done",
                    text: res.msg,
                    type: 'success',
                    hideAfter:4000,
                    styling: 'bootstrap3',
                });
                _this.find('td:nth-child(1)').html(new_name_en);
                // _this.find('td:nth-child(3)').html(new_name_sv);
            }
            else{
                new PNotify({
                    title: "Wrong!",
                    text: res.msg,
                    type: 'error',
                    hideAfter:4000,
                    styling: 'bootstrap3'
                });
                _this.find('td:nth-child(1)').text(name_en);
                // _this.find('td:nth-child(3)').text(new_name_sv);

            }
        },'json');
        $(this).closest('td').append('<button  type="button" class="btn btn-primary edit" style="border:0px;" ><i class="icon-edit"></i></button>');
        $(this).closest('td').find('.cancel').remove();
        $(this).remove();
    });
    $('th').addClass('text-center');

});

