       
<!-- Google Map -->

<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>


<?php
echo "<script src='".site_url("js/jquery.ui.map.js")."'></script>" ;
echo "<script src='".site_url("js/jquery.form.js")."'></script>" ;



?>
<!-- Contact Form -->
<!-- Google Map Init-->
<script type="text/javascript">
    jQuery(function($){
        //getter
        var zoom= $('#map_canvas').gmap('option', 'zoom');
        
        $('#map_canvas').gmap().bind('init', function(ev, map) {
            $('#map_canvas').gmap('addMarker', {'position': '41.543014,2.434924', 'bounds': true});
            $('#map_canvas').gmap('option', 'zoom', 17);
        });
    });
</script>

