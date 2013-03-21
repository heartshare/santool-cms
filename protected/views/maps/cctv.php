<script type="text/javascript">

  $(document).ready(function() {

                    $("#mapcctv").gmap3({
                      map:{
                            options:{
                              center:[-7.350815,112.725568],
                              zoom: 16
                            }
                      },
                      marker:{
                            values:[
                              {latLng:[-7.350815,112.725568], options:{icon: "http://google-maps-icons.googlecode.com/files/cctv.png"}}
                            ],
                            options:{
                              draggable: false
                            },
                            events:{
                              click: function(marker, event, context){
                                    var content = 				$.fancybox.open({
                                    href : 'http://180.250.165.91/capture/024.jpg',
                                    type : 'image'
                                    //padding : 5
                            });
                                    var map = $(this).gmap3("get"),
                                      infowindow = $(this).gmap3({get:{name:"infowindow"}});
                                    if (infowindow){
                                      //infowindow.open(map, marker);
                                      //infowindow.setContent(context.data);

                                    } else {
                                      $(this).gmap3({
                                            infowindow:{
                                              anchor:marker, 
                                              options:{ //content: context.data}
                                                    content: content
                                              }
                                            }
                                      });
                                    }
                              },
                              close: function(){
                                    var infowindow = $(this).gmap3({get:{name:"infowindow"}});
                                    if (infowindow){
                                      infowindow.close();
                                    }
                              }
                            }
                      }
                    });

  });
</script>  
<div class="span3">
    <hr />
    Menampilkan snaphot CCTV
</div>
<div class="span9">
    <div id="mapcctv" style="height:200px;" class="gmap3"></div>
</div>