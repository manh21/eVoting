<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/template/frontend/') ?>vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/template/frontend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    // scroll functions
    $(window).scroll(function(e) {

        // add/remove class to navbar when scrolling to hide/show
        var scroll = $(window).scrollTop();
        if (scroll >= 150) {
            $('.navbar').addClass("navbar-hide");
        } else {
            $('.navbar').removeClass("navbar-hide");
        }

    });
</script>