var map;
        var geocoder;
        var centerChangedLast;
        var reverseGeocodedLast;
        var currentReverseGeocodeResponse;

        function initialize(map_lat, map_lon, map_zoom) {

          map_lat   = typeof map_lat !== "undefined" ? map_lat : "-11.957748311511065";
          map_lon   = typeof map_lon !== "undefined" ? map_lon : "-77.08082939754489";
          map_zoom  = typeof map_zoom !== "undefined" ? map_zoom : 12;

          var latlng = new google.maps.LatLng(map_lat, map_lon);

          var myOptions = {
            zoom: map_zoom,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };

          map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
          geocoder = new google.maps.Geocoder();
          setupEvents();
          centerChanged();
          var opt = { minZoom: 3 };
          map.setOptions(opt);

          $("#map_clear").click(function(e) {
            google.maps.event.trigger(map, "resize");
            console.log("haz hecho clic");
          });

        }

        function setupEvents() {

          reverseGeocodedLast = new Date();
          centerChangedLast = new Date();

          setInterval(function() {
            if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
              if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
                reverseGeocode();
            }
          }, 1000);

          google.maps.event.addListener(map, "center_changed", centerChanged);
          google.maps.event.addDomListener(document.getElementById("crosshair"),"dblclick", function() {
             map.setZoom(map.getZoom() + 1);
          });

        }

        function getCenterLatLngText() {

          return "(" + map.getCenter().lat() +", "+ map.getCenter().lng() +")";

        }

        function centerChanged() {

          centerChangedLast = new Date();
          var latlng = getCenterLatLngText();
          var lat = map.getCenter().lat();
          var lng = map.getCenter().lng();
          document.getElementById("lat").value = lat;
          document.getElementById("lng").value = lng;
          document.getElementById("mgs_lat").value = lat;
            document.getElementById("mgs_lng").value = lng;
          reverseGeocode();

        }

        function reverseGeocode() {

          reverseGeocodedLast = new Date();
          geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);

        }

        function reverseGeocodeResult(results, status) {

          currentReverseGeocodeResponse = results;

          if(status == "OK") {
            if(results.length == 0) {
              document.getElementById("formatedAddress").innerHTML = "???";
            } else {
              document.getElementById("formatedAddress").innerHTML = results[0].formatted_address;
            }
          } else {
            document.getElementById("formatedAddress").innerHTML = "???";
          }

        }

        function geocode() {

          var address = document.getElementById("address").value;

          geocoder.geocode({
            "address": address,
            "partialmatch": true
          }, geocodeResult);

        }

        function geocodeResult(results, status) {

          if (status == "OK" && results.length > 0) {
            map.fitBounds(results[0].geometry.viewport);
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }

        }

        function addMarkerAtCenter() {

          var marker = new google.maps.Marker({
              position: map.getCenter(),
              map: map
          });

          var text = "Lat/Lng: " + getCenterLatLngText();

          if(currentReverseGeocodeResponse) {
            var addr = "";
            if(currentReverseGeocodeResponse.size == 0) {
              addr = "None";
            } else {
              addr = currentReverseGeocodeResponse[0].formatted_address;
            }
            text = text + "<br>" + "Dirección: <br>" + addr;
          }

          var infowindow = new google.maps.InfoWindow({ content: text });

          google.maps.event.addListener(marker, "click", function() {
            infowindow.open(map,marker);
          });

        }

        document.addEventListener("DOMContentLoaded", function() {

              initialize();
          
        });

        document.onkeypress = function (e) {

          e = e || window.event;

          var keycode = (e.keyCode ? e.keyCode : e.which);
          if(keycode == "13"){
            geocode();    
          }

        };
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//

    function inicializar_cliente() {
            var megasystemas = {lat: -11.957748311511, lng: -77.080829397545};
            var mapa = new google.maps.Map(document.getElementById("map_cliente"), {
              zoom: 15,
              center: megasystemas
            });
        

            var contentString = "<h3>Aun no se ha establecido la ubicación para este cliente</h3>";

            var infowindow = new google.maps.InfoWindow({
              content: contentString
            });

            var marker = new google.maps.Marker({
              position: megasystemas,
              map: mapa,
              title: "Megasystemas (Mario Lozano)"
            });
            marker.addListener("click", function() {
              infowindow.open(mapa, marker);
            });
          }      

      function inicializar()
      {
      initialize();
      inicializar_cliente();
      }
