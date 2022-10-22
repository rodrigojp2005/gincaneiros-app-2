<html>
  <head>
    <title>Pegar local no mapa</title>
    <style>
    /* 
        * Always set the map height explicitly to define the size of the div element
        * that contains the map. 
        */
        #map {
        height: 100%;
        }

        /* 
        * Optional: Makes the sample page fill the window. 
        */
        html,
        body {
        height: 90%;
        width: 100%;
        margin: 0;
        padding: 0;
        }
    </style>
<script>
  function initialize()//initMap()
  {
    const myLatlng = { lat: -29.793944, lng: -51.887258 };
    const map = new google.maps.Map(document.getElementById('map'), 
    {
      zoom: 4,
      center: myLatlng,
    });
  
    // Create the initial InfoWindow.
  
    let infoWindow = new google.maps.InfoWindow(
    {
      content: "1º Escolha uma localização no mapa <br> 2º Leve o boneco do street View no local escolhido <br> 3º Faça uma pergunta curiosa à respeito do local",
      position: myLatlng,
    });
    
    infoWindow.open(map);
  
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => 
    {
      // Close the current InfoWindow.
      infoWindow.close();
      // Create a new InfoWindow.
      infoWindow = new google.maps.InfoWindow
      ({
        position: mapsMouseEvent.latLng,
      });
      str_lat= mapsMouseEvent.latLng.lat();
      str_lng= mapsMouseEvent.latLng.lng();
      // get address from latlng 
      var geocoder = new google.maps.Geocoder();
      var latlng = {lat: str_lat, lng: str_lng};
      geocoder.geocode({'location': latlng}, function(results, status) 
      {
        if (status === 'OK') 
        {
            //get address components
            var address_components = results[0].address_components;
            //get city
            // var city = address_components[2].long_name;
            // var city = address_components[0].long_name;
         //   var one=address_components[1].long_name;
            var two=address_components[2].long_name;
            var three=address_components[3].long_name;
           // var four=address_components[4].long_name;
            var five=address_components[5].long_name;
         //   var six=address_components[6].long_name;
console.log("Bairro: "+two+"-Cidade: "+three+" - País: "+five);
            //get state short name
            var state = address_components[4].short_name;
            //var state = address_components[4].long_name;

            var local_formatado= three+" , "+ state +" - "+five;
          //   console.log("País fomatado: "+local_formatado);
          //   console.log("<br>Estado: "+state);
          //   get country
          //   var country = address_components[5].long_name;
          //   get postal code
          //   var postal_code = address_components[6].long_name;
          //   get street number
          //   var street_number = address_components[0].long_name;
          //   get route
          //   var route = address_components[1].long_name;
          //   get formatted address
          //   var formatted_address = results[0].formatted_address;
          //   get place id
          //   var place_id = results[0].place_id;
          //   get types
          //   var types = results[0].types;
          //   get url
          //   var url = results[0].url;
          //   get vicinity
          //   var vicinity = results[0].vicinity;
          //   get website
          //   var website = results[0].website;
          //   get utc offset
          //  console.log("cidade:"+city);

          //   console.log(results[0].formatted_address);
            //infoWindow.setContent(results[0].formatted_address);
            //infoWindow.open(map);
            let lat_formated = str_lat.toFixed(6);
            let lng_formated = str_lng.toFixed(6);

            // document.getElementById("endereco").value = results[0].formatted_address;
            document.getElementById("endereco").value = local_formatado;
            document.getElementById("lat").value = lat_formated;
            document.getElementById("lng").value = str_lng.toFixed(6);
        }       
      });

      console.log(str_lat,str_lng);
       
      infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
      );
      infoWindow.open(map);
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
<!--
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
-->
    <!-- playground-hide 
    <script>
      const process = { env: {} };
      process.env.GOOGLE_MAPS_API_KEY =
        "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg";
    </script>
     playground-hide-end -->

    <!--<link rel="stylesheet" type="text/css" href="./style.css" />-->
    <!--<script type="module" src="./index.js"></script>-->
  </head>
  <body>
    <div id="streetview"></div><!-- colocado aqui para o streetview funcionar -->
    <div id="map" onclick="myFunction()"></div>
   
 <div class="p-8 mx-4">        
        <form action="{{ route('gincana.store') }}" method="POST" >
            @csrf
            <div class="mb-6">
                <label for="lat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Latitude:</label>
                <input type="text" id="lat" name="lat" placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Longitude:</label>
                <input type="text" id="lng" name="lng"  placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Endereço:</label>
                <input type="text" id="endereco" name="endereco"  placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <!-- <div class="mb-6">
                <label for="tema" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Informe a resposta certa: </label>
                <input type="text" id="resposta" name="resposta"  placeholder="Ex.: 231" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div> -->
            <!-- pegar o id do usuario logado -->
            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

          <!-- <button type="button" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirmar</button>-->
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
          <button type="submit" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
  </body>
</html>