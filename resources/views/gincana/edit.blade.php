@extends('layouts.aplicativo')
@extends('layouts.navflow')
@section('criar')
<script>
  function initialize()//initMap()
  {
    // var ginLat={{$gincana->lat}};
    // var ginLng={{$gincana->lng}};
    const myLatlng = { lat: {{$gincana->lat}}, lng: {{$gincana->lng}} };
    const map = new google.maps.Map(document.getElementById('map'), 
    {
      
      //desativar elementos UI do mapa
      disableDefaultUI: true,
      //habilitar zoom
      zoomControl: true,
      zoom: 3,
      center: myLatlng,
      // habilitar bonequinho do mapa
     // streetViewControl: true,
      // habilitar mapa híbrido
      //mapTypeId: google.maps.MapTypeId.HYBRID,
      // habilitar mapa satélite
      //mapTypeId: google.maps.MapTypeId.SATELLITE,
      // habilitar mapa terreno
      //mapTypeId: google.maps.MapTypeId.TERRAIN,
      // habilitar mapa normal
      //mapTypeId: google.maps.MapTypeId.ROADMAP,
      // habilitar zoom com scroll
      //scrollwheel: true,
      // habilitar zoom com botão direito
      //disableDoubleClickZoom: false,
      // habilitar zoom com botão direito
     // draggable: true,
      // habilitar zoom com botão direito
      //keyboardShortcuts: true,

    });
  
    //criar objeto panorama e mostrar no mapa
  //   const panorama = new google.maps.StreetViewPanorama(
  //   document.getElementById("pano"),
  //   {
  //     position: myLatlng,
      
  //     pov: {
  //       heading: 34,
  //       pitch: 10,
  //     },
  //   }
  // );

  //  map.setStreetView(panorama);


    // Create the initial InfoWindow.
  
    let infoWindow = new google.maps.InfoWindow(
    {
      content: "1º Escolha a sua nova localização.",
      position: myLatlng,
    });
    
    infoWindow.open(map);
  
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => 
    {
      
      // Close the current InfoWindow.
      infoWindow.close();
      // Create a new InfoWindow.
      // infoWindow = new google.maps.InfoWindow
      // ({
      //   position: mapsMouseEvent.latLng,
      // });
      str_lat= mapsMouseEvent.latLng.lat();
      str_lng= mapsMouseEvent.latLng.lng();

      const panorama = new google.maps.StreetViewPanorama(
      document.getElementById("pano"),
      {
        // desabilitar UI do street view
       // disableDefaultUI: false,
        // habilitar zoom
       // zoomControl: true,
      addressControl: false,
      fullscreenControl: false,
      position: mapsMouseEvent.latLng,
        pov: {
          heading: 34,
          pitch: 10,
        },
      }
    );

    map.setStreetView(panorama);


      // get address from latlng 
      var geocoder = new google.maps.Geocoder();
      var latlng = {lat: str_lat, lng: str_lng};
      geocoder.geocode({'location': latlng}, function(results, status) 
      {
        if (status === 'OK') 
        {
            //get address components
            var address_components = results[0].address_components;
            console.log("addres: "+address_components[0].long_name);
            // get street address
            var street = address_components[1].long_name;
            console.log("Rua: "+street);
          
            var two=address_components[2].long_name;
            var three=address_components[3].long_name;
            var five=address_components[5].long_name;
console.log("Bairro: "+two+"-Cidade: "+three+" - País: "+five);
            var state = address_components[4].short_name;
            var local_formatado= street+" ,"+ three+" , "+ state +" - "+five;
            let lat_formated = str_lat.toFixed(6);
            let lng_formated = str_lng.toFixed(6);

            // document.getElementById("endereco").value = results[0].formatted_address;
            document.getElementById("endereco").value = local_formatado;
            document.getElementById("lat").value = lat_formated;
            document.getElementById("lng").value = str_lng.toFixed(6);
        }       
      });

      console.log(str_lat,str_lng);
       
      // infoWindow.setContent(
      //   JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
      //   );
      //   infoWindow.open(map);
    });
  }
  /*
  declare global 
  {
    interface Window 
    {
      initMap: () => void;
    }
  }
  */
  
  //window.initMap = initMap;
  window.onload = initialize;
  function myFunction()
  {
  //  document.getElementById("lat").value = str_lat;
    //document.getElementById("lng").value = str_lng;
   // document.getElementById("endereco").value = str_endereco;
  }
    //export {};
</script>
    <!-- criar div com panorama sobre a div do mapa , de forma que o panorama fique sobre o mapa -->
    <div id="pano" style="position: absolute; top: 0; left: 0; width: 40%; height: 40%;"></div>
    <!-- <div id="pano"></div> -->
    <!-- <div id="map" onclick="myFunction()"></div> -->
    <div id="map"></div>
  <div class="p-8 mx-4 my-4">        
        <form action="{{ route('gincana.update', $gincana['id'])}}" method="POST" >
            @csrf
            @method('PUT')
            
            <div class="mb-6" hidden>
                <label for="lat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Latitude:</label>
                <input type="text" id="lat" name="lat" placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6" hidden>
                <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Longitude:</label>
                <input type="text" id="lng" name="lng"  placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Endereço:</label>
                <input type="text" id="endereco" name="endereco" value="{{$gincana->endereco}}" placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <!-- <div class="mb-6">
                <label for="tema" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Informe a resposta certa: </label>
                <input type="text" id="resposta" name="resposta"  placeholder="Ex.: 231" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div> -->
            <!-- pegar o id do usuario logado -->
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

          <!-- <button type="button" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirmar</button>-->
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirmar</button>
          <button type="submit" class="my-4 text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <a href="{{ route('gincana.index') }}">
                    Voltar
                </a>
            </button>
        </form>
    </div>

    <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3VgDsnZQDKV1w4TM-D19msn3TgOOMuzk&callback=initialize">
    </script> 
  
  
