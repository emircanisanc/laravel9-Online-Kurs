/*
$('.tree-toggle').click(function() {
    $(this).parent().children('ul.tree').toggle(200);
});
$(function() {

    $('.tree-toggle').each(function() {
        $(this).parent().children('ul.tree').toggle(200);
        console.log($(this));
    })
    


}) 
*/
$('.tree-toggle').click(function() {
    $(this).parent().children('ul.tree').toggle(200);
});
$(function() {
    $('.tree-toggle').parent().children('ul.tree').toggle(200);
})