<?php
//
// ext is your protected.extensions folder
// gmaps means the subfolder name under your protected.extensions folder
//  
//Yii::import('ext.EGMAP.*');
 
$gMap = new EGMap();
$gMap->zoom = 10;
$mapTypeControlOptions = array(
  'position'=> EGMapControlPosition::LEFT_BOTTOM,
  'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
);
 
$gMap->mapTypeControlOptions= $mapTypeControlOptions;
 
$gMap->setCenter(39.721089311812094, 2.91165944519042);
 
// Create GMapInfoWindows
$info_window_a = new EGMapInfoWindow('<div>I am a marker with custom image!</div>');
$info_window_b = new EGMapInfoWindow('Hey! I am a marker with label!');
 
$icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/gazstation.png");
 
$icon->setSize(32, 37);
$icon->setAnchor(16, 16.5);
$icon->setOrigin(0, 0);
 
// Create marker
$marker = new EGMapMarker(39.721089311812094, 2.91165944519042, array('title' => 'Marker With Custom Image','icon'=>$icon));
$marker->addHtmlInfoWindow($info_window_a);
$gMap->addMarker($marker);
 
// Create marker with label
$marker = new EGMapMarkerWithLabel(39.821089311812094, 2.90165944519042, array('title' => 'Marker With Label'));
 
$label_options = array(
  'backgroundColor'=>'yellow',
  'opacity'=>'0.75',
  'width'=>'100px',
  'color'=>'blue'
);
 
// SECOND WAY:
$marker->labelContent= '$425K';
$marker->labelStyle=$label_options;
$marker->draggable=true;
$marker->labelClass='labels';
$marker->raiseOnDrag= true;
 
$marker->setLabelAnchor(new EGMapPoint(22,0));
 
$marker->addHtmlInfoWindow($info_window_b);
 
$gMap->addMarker($marker);
 
// enabling marker clusterer just for fun
// to view it zoom-out the map
$gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
 
$gMap->renderMap();
?>
<style type="text/css">
.labels {
   color: red;
   background-color: white;
   font-family: "Lucida Grande", "Arial", sans-serif;
   font-size: 10px;
   font-weight: bold;
   text-align: center;
   width: 40px;     
   border: 2px solid black;
   white-space: nowrap;
}
</style>
