<x-app-layout>
 <!--   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            {{ ('Dashboarde') }}
        </h2>
    </x-slot>-->
    <div id="streetview"></div>
    <div id="map" onclick="myFunction()"></div>

    <div class="p-8 mx-4">        
        <form action="{{ route('gincana.store') }}" method="POST" >
            @csrf
            <input type="hidden" id="dica-id" name="dica"  placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >1</input>

           <!-- <div class="mb-6">-->
          <!--      <label for="palavra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Longitude:</label>-->
                <input type="hidden" id="palavra-id" name="palavra" placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- </div> -->
            <!-- <div class="mb-6"> -->
          <!--      <label for="dica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Latitude:</label>-->
                <input type="hidden" id="dica-id" name="dica"  placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- </div> -->
            <div class="mb-6">
                <label for="dica" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Endereço:</label>
                <input type="text" id="endereco" name="endereco"  placeholder="Clique no mapa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="tema" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Faça uma pergunta curiosa sobre o local! </label>
                <input type="text" id="tema" name="tema"  placeholder="Ex.:Qual o nº da casa verde?" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="tema" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Informe a resposta certa: </label>
                <input type="text" id="resposta" name="resposta"  placeholder="Ex.: 231" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            
           <!-- <button type="button" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirmar</button>-->
           <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
           <button type="submit" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <a href="{{ route('gincana.index') }}">
                    Voltar
                </a>
            </button>
        </form>
    </div>
    <!--<div id="map" ></div>-->
<!--
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    You're logged in!

                </div>
            </div>
        </div>
    </div>
-->
    <script>
  function initMap()
  {
    var geocoder = new google.maps.Geocoder();
    var map;
    var endereco;

    const myLatlng = { lat: -29.793944, lng: -51.887258 };
    var mapOptions =  
    {
      zoom: 4,
      center: myLatlng,
        mapTypeControl: false,
        
    };
    map = new google.maps.Map(document.getElementById('map'),mapOptions);
  /*  const map = new google.maps.Map(document.getElementById('map'), 
    {
      zoom: 4,
      center: myLatlng,
        mapTypeControl: false,
        
    });*/
 //   map = new google.maps.Map(document.getElementById('map'), mapOptions);
  
    // Create the initial InfoWindow.



    //adrees end



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
     // endereco=google.maps.placeId();
     // console.log(endereco);
      console.log(str_lat,str_lng);
  
      geocoder.geocode
      ({
        'latLng': mapsMouseEvent.latLng
      }, function(results, status) 
      {
        if (status == google.maps.GeocoderStatus.OK) 
        {
          if (results[0]) 
          {
            endereco = results[0].formatted_address;
            document.getElementById("endereco").value = endereco;
            console.log(results[0].formatted_address);
            infoWindow.setContent(results[0].formatted_address);
            infoWindow.open(map);
          }
        }
      });

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
  
  window.initMap = initMap;
  function myFunction()
  {
    document.getElementById("palavra-id").value = str_lat;
    document.getElementById("dica-id").value = str_lng;
  }
    //export {};
</script>

 <!--   <script>
          let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

window.initMap = initMap;
</script>-->
</x-app-layout>
