$(function(){
    let sidebar_btn = $('#sidebar-btn');
    let sidebar = $('#sidebar');
    let sidebar_btn_icon = $('#hamburger');
    let navbar = $('nav.navbar');
    sidebar_btn.click(function(){
        sidebar.toggleClass('sidebar-show');
        sidebar_btn_icon.toggleClass('bi bi-x');
    })
})