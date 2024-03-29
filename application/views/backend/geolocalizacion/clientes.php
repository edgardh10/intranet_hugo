<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      a.mmapa {
          display: block;
          height: 20px;
          line-height: 20px;
      }
    </style>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        },
        'Los Olivos': {
          label: 'LO'
        },
        'Puente Piedra': {
          label: 'PP'
        },
        'San Martin de Porres': {
          label: 'SM'
        },
        'Independencia': {
          label: 'IN'
        },
        'Comas': {
          label: 'CO'
        },
        'Callao': {
          label: 'CA'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-11.9541076, -77.0858756),
          zoom: 14
        });
        var infoWindow = new google.maps.InfoWindow;
          var api_url = '<?php echo base_url(); ?>';
          // Change this depending on the name of your PHP or XML file
          downloadUrl(api_url+'geolocalizacion/get_clientes', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var cords = markerElem.getAttribute('lat')+','+markerElem.getAttribute('lng')+',18z';
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);

              var find_map = document.createElement('div');
              find_map.innerHTML = '<a class="mmapa" href="https://www.google.com/maps/@'+cords+'" target="_blank"></a>';
              infowincontent.appendChild(find_map);

              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOqYWLusrsIz34L7tRk-9Gz6amIuXqf2o&callback=initMap">
    </script>
<div id="map"></div>
