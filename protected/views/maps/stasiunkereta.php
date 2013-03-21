<script type="text/javascript">

  $(document).ready(function() {

        $("#mapterminal").gmap3({
          map:{
            options:{
              center:[-7.350815,112.725568],
              zoom: 18
            }
          },
          marker:{
            values:[
              {latLng:[-7.350815,112.725568], data:'http://180.250.165.91/capture/024.jpg', id:"content1", options:{icon: "http://google-maps-icons.googlecode.com/files/cctv.png"}},
              {latLng:[-7.350725,112.724296], data:'http://180.250.165.91/capture/037.jpg', id:"content2", options:{icon: "http://google-maps-icons.googlecode.com/files/cctv.png"}}
            ],
            options:{
              draggable: false
            },
            events: {
              click: function(marker, event, context){
                markerSelected(context.id, context.data);
              }
            }
          }
        });
        
      function markerSelected(id, data){
            $.fancybox.open({
                    href : data,
                    type : 'image'
            });
      }

  });
</script>  
<div class="span3">
    <hr />
    Menampilkan snaphot CCTV di Terminal Bungurasih
</div>
<div class="span9">
    <div id="mapterminal" style="height:200px;" class="gmap3"></div>
</div>