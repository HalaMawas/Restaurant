/**
 * Created by Cesaer on 01/06/2017.
 */
$(function(){
    $('label.expandable').closest('li').children('ul').hide();
    $('label.expandable').click(function() {
        $(this).closest('li').children('ul').toggle();
        return false;
    });
    $('.main').change(function () {
        if ($(this).prop("checked")==true) {
            
            $(this).closest('.parent').find('input[type=checkbox]:nth-child(1)').prop("checked", true);
        }
        // if( $('label.expandable').closest('li').children('ul').prop("checked"))
        // {
        //
        // }
        else
        {
            $(this).closest('.parent').find('input[type=checkbox]:nth-child(1)').prop("checked", false);
        }
    });
});
