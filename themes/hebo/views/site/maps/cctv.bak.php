    <div class="span3">
        <hr />
        Menampilkan snaphot CCTV di ruas-ruas jalan
    </div>
    <div id="map_halte" style="height: 200px;" class="span9">
        <?php

            $gMap = new EGMap();
            $gMap->setJsName('test_map');
            $gMap->width = '100%';
            $gMap->height = '100%';
            $gMap->zoom = 17;
            $gMap->setCenter(-7.315094, 112.690649);
            
            $var = "test";

            $info_box = new EGMapInfoBox($var);

            // set the properties
            
            $info_box->pixelOffset = new EGMapSize('0','-140');
            $info_box->maxWidth = 0;
            $info_box->boxStyle = array(
                'width'=>'"280px"',
                'height'=>'"120px"',
                'background'=>'"url(http://google-maps-utility-library-v3.googlecode.com/svn/tags/infobox/1.1.9/examples/tipbox.gif) no-repeat"'
            );
            
            $info_box->closeBoxMargin = '"10px 2px 2px 2px"';
            $info_box->infoBoxClearance = new EGMapSize(1,1);
            $info_box->enableEventPropagation ='"floatPane"';
            
            // with the second info box, we don't need to 
            // set its properties as we are sharing a global 
            // info_box
            //$info_box2 = new EGMapInfoBox('<div style="color:#000;border: 1px solid #c0c0c0; margin-top: 8px; background: #c0c0c0; padding: 5px;">I am a marker with info box 2!</div>');
            // Create marker
            $marker = new EGMapMarker(-7.315094, 112.690649, array('title' => 'Marker With Info Box'));
            $marker->setEvents('click');
            // add two 
            //$marker2 = new EGMapMarker(39.721089311812094, 2.81165944519042, array('title' => 'Marker With Info Box 2'));
            $marker->addHtmlInfoBox($info_box);


            $gMap->addMarker($marker);
            //$gMap->addMarker($marker2);

            $gMap->renderMap();
        ?>
    </div>

<script type="text/javascript">

 </script>