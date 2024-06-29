
<script type="text/javascript" src="js/quickview.js?v=15052024"></script>
<script type="text/javascript" src="js/index.js?v=15052024"></script>
<script type="text/javascript" src="js/main.js?v=15052024"></script>
<script type="text/javascript">
    function changeImageQuickView(img, selector) {
        var src = $(img).attr("src");
        src = src.replace("_compact", "");
        $(selector).attr("src", src);
    }

    $(document).on('click', '.backdrop__body-backdrop___1rvky, .cart_btn-close', function () {
        $('.backdrop__body-backdrop___1rvky, .cart-sidebar, #popup-cart-desktop, .popup-cart-mobile').removeClass('active');
        return false;
    })

</script>
