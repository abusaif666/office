$(document).ready(function () {
    // ===== SIDEBAR SUBMENU SHOW HIDE SCRIPT =====
    $(".has-submenu > a").click(function (e) {
        e.preventDefault();
        var $submenu = $(this).next(".submenu");
        var $parentLi = $(this).parent("li");
        $(".submenu").not($submenu).stop().slideUp();
        $(".has-submenu").not($parentLi).stop().removeClass("active");
        $submenu.stop().slideToggle();
        $parentLi.stop().toggleClass("active");
    });



    // ===== SIDEBAR SHOW HIDE SCRIPT =====
    $(".dashboardSidebarShowHideBtn").click(function (e) {
        $('.sidebar_wrapper').stop().toggleClass('sidebar_toggle')
        $('.body_area').stop().toggleClass('body_area_toggle')
    });


    // ===== SIDEBAR SHOW HIDE SCRIPT =====
    $(".dashboardSidebarShowHideBtn2").click(function (e) {
        $('.sidebar_wrapper').stop().toggleClass('sidebar_toggle_sm_screen')
    });


    

    // ===== SIDEBAR SHOW HIDE SCRIPT =====
    $(document).click(function (event) {
        if (!$(event.target).closest(".admin_user_box, .admin_dropdown_box").length) {
            $(".admin_dropdown_box").removeClass("toggle_admin_dropdown_box");
        }
    });
    
    $(".admin_user_box").click(function (event) {
        event.stopPropagation(); // Prevents the document click from firing immediately
        $(".admin_dropdown_box").toggleClass("toggle_admin_dropdown_box");
    });


    





});
