@extends("frontend.layout")
@section("controller")
	<div style="width:100%; height:500px;">
            
            <!-- http://damynghetaothe.com/public/home -->
            <!-- sau do vao trang de lay toa do cua minh -->
            <!-- latlong.net -->
            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBynM-M9Wbv9_qEK3QwTRVcpuygF9Lttqo"></script><div style="overflow:hidden;height:500px;width:581px;"><div id="gmap_canvas" style="height:500px;width:581px;"><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(20.279180,106.205148),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(20.279180, 106.205148)});infowindow = new google.maps.InfoWindow({content:"<b>Nam Dinh</b><br/><b>Địa chỉ:</b> Nam Dinh<br/> " });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            
            
            </div>

@endsection