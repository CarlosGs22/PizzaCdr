$(function() {


    $('.tablaDatatable').dataTable({
        searching: false,
        paging: false,
        info: false
    });





    $("#v-pills-tab .nav-item").click(function() {
        if (window.matchMedia('(max-width: 773px)').matches) {
            $("#btnNav").click();
        }
    });
});