<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/template/backend/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/template/backend/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- momentjs -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/moment/min/moment.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/template/backend/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/template/backend/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/backend/') ?>dist/js/adminlte.min.js"></script>

<!-- Breadcrumb -->
<script>
    //Breadcrumbs based on URL location
    if ($('#content-header ol.breadcrumb')) {
        var here = location.href.replace(/(\?.*)$/, '').split('/').slice(3);

        var parts = [{
            "text": 'Home',
            "link": '/'
        }];

        for (var j = 0; j < here.length; j++) {
            var part = here[j];
            var pageName = part.toLowerCase();
            pageName = part.charAt(0).toUpperCase() + part.slice(1);
            var link = '/' + here.slice(0, j + 1).join('/');
            $('#siteBreadcrumb ol.breadcrumb').append('<li><a href="' + link + '">' + pageName.replace(/\.(htm[l]?|asp[x]?|php|jsp)$/, '') + '</a></li>');
            parts.push({
                "text": pageName,
                "link": link
            });
        }
    }
</script>