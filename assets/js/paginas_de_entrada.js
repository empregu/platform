$(document).ready(function(){
    $('.tabs').tabs();
    $('#tabs-swipe-demo').tabs({ 'swipeable': true });
    $('#submeter_logar').click(function () {
        alert("jOOjjjj");
    });
    $('#ainda_nao_tenho_conta').click(function () {
        $('.tabs').tabs('select', 'registrar');
    });
    $('#ja_tenho_conta').click(function () {
        $('.tabs').tabs('select', 'logar');
    });
});