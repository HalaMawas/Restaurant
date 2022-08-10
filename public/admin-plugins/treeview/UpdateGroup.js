/**
 * Created by Cesaer on 01/06/2017.
 */
$(document).ready(function(){
    $('label.expandable').closest('li').children('ul').hide();
    $('label.expandable').click(function() {
        $(this).closest('li').children('ul').toggle();
        return false;
    });
    $('.main').change(function () {
        if ($(this).prop("checked")==true) {
            $(this).closest('.parent').find('input[type=checkbox]:nth-child(1)').prop("checked", true);
        }
        else
        {
            $(this).closest('.parent').find('input[type=checkbox]:nth-child(1)').prop("checked", false);
        }
    });
    $('select').change(function(){
        $('label.expandable').closest('li').children('ul').show();
        $('input[type=checkbox]').each(function(){
            $(this).prop("checked", false);
        });
        // var data = data + "&cmd=select_group";
        var data=  "&id=" +$(this).val();
        var url=$(this).data('route');
        console.log(url);
        $.post(url,data,function(res){
            for($i = 0;$i <res.length;$i++){
                $('input[type=checkbox]').each(function(){
                    //console.log($(this).val());
						 $per=$(this).val();
                        if( $per.includes(res[$i]['name'])){
                        $(this).prop("checked", true);
                        return false;
                    }
                })
            }
        },'json');
    });
    // $('.btn-success').click(function () {
    //     var checkData = [];
    //     $('.help-block').html('');
    //     $('.col-md-9').removeClass('has-error');
    //     if($('#group').val()==""){
    //         $('#group').closest("div").find('.help-block').html('<strong>يرجى تعبئة هذا الحقل بالبيانات</strong>');
    //         $('#group').closest("div").addClass('has-error');
    //         $('#group').focus();
    //     }
    //     else {
    //         // check parents to be added to array
    //         $('input[type=checkbox]').each(function() {
    //             _this = $(this);
    //             if(_this.prop("checked")==true){
    //                 _this.closest('.parent').find('.main').prop("checked",true);
    //             }
    //         });
    //         // check all the checked values
    //         $('input[type=checkbox]').each(function(){
    //             _this = $(this);
    //             if(_this.prop("checked")==true){
    //                 checkData.push(_this.data('name')) ;
    //             }
    //         });
    //         var data = $(document).find('form').serialize();
    //         data = data +'&privileges='+checkData;
    //         data = data + "&cmd=update_group";
    //         $.post('DB/Route.php',data,function(res){
    //             if(res.success == true ) {
    //                 $.toast({
    //                     heading: 'Success',
    //                     text: res.data,
    //                     position: 'top-right',
    //                     hideAfter: 4000,
    //                     icon: 'success'
    //                 });
    //             }
    //             else{
    //                 $.toast({
    //                     heading: 'Error',
    //                     text: res.data.data,
    //                     position: 'top-right',
    //                     hideAfter: false,
    //                     icon: 'error'
    //                 });
    //             }
    //         },'json');
    //     }
    // });
});
